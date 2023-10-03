<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Models\DetailConsumer;
use App\Services\BranchService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CompleteDataController extends Controller
{
    public function __construct(private BranchService $branchService)
    {
    }

    public function index()
    {
        $branches = $this->branchService->getBranches();

        return view('complete-data', compact('branches'));
    }


    public function store(Request $request)
    {
        try {
            $branches = $this->branchService->getBranches();

            $data = $request->validate([
                'kabupaten' => "required|string",
                'kecamatan' => "required|string",
                'kelurahan' => "required|string",
                'branch_id' => "required|integer",
                'rt' => "required|string",
                'rw' => "required|string",
                'alamat' => "required|string",
                'kode_pos' => "required|string",
                'no_hp' => "required|string",
                'foto_rumah' => "required|image|size:1024|mimes:jpeg,png,jpg,gif"
            ]);

            // get selected branch detail
            $branch = Arr::first($branches, function (array $value) use ($data) {
                return $value["id"] === (int)$data["branch_id"];
            });
            if (!$branch) throw new InvariantException("Cabang yang anda pilih tidak valid!");

            /** @var \App\Models\User */
            $user = auth()->user();

            // get file request and generate random file name
            $file = $request->file("foto_rumah");
            $filename = $file->hashName();

            // save file to disk
            $filepath = $file->storeAs('images/customers/rumah', $filename);
            if (!$filepath) throw new InvariantException("Terjadi kesalahan pada server.");

            $data["branch_id"] = $branch["id"];
            $data["branch_name"] = $branch["name"];
            $data["foto_rumah"] = $filepath;

            $detailConsumer = new DetailConsumer($data);
            $detailConsumer->user()->associate($user);
            $detailConsumer->save();

            return redirect(route('category.list'));
        } catch (InvariantException $e) {
            return redirect()->back()->withErrors(["message" => $e->getMessage()]);
        }
    }
}
