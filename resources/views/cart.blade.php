@extends('layouts.order-layout')

@section('content')
    <div class="order-section">
        @forelse ($items as $item)
            <div class="product-item" id="item-{{ $item['id'] }}" data-index="{{ $loop->index }}">
                <div class="product-image">
                    <img src={{ $item['associatedModel']['images'][0]['image'] }} alt="{{ $item['name'] }}">
                </div>
                <div class="product-details">
                    <h3 class="product-name">{{ $item['name'] }}</h3>
                    <p class="product-price">Rp. {{ $item['price'] }}</p>
                </div>
                <div class="sep"></div>
                <div class="product-action">
                    <button type="button" class="btn-icon" style="margin-right: 10px"
                        onclick="deleteItem(event, {{ $item['id'] }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12M8 9h8v10H8V9m7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5Z" />
                        </svg>
                    </button>

                    <div class="cart-number">
                        <button type="button" id="btnDecr" class="btn-icon"
                            onclick="updateItemQty(event, {{ $item['id'] }}, -1)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 13H5v-2h14v2Z" />
                            </svg>
                        </button>

                        <div class="cart-amount">
                            <p id="amtDisplay-{{ $item['id'] }}">{{ $item['quantity'] }}</p>
                            <input type="text" hidden value="{{ $item['quantity'] }}"
                                id="amtInput-{{ $item['id'] }}">
                        </div>

                        <button type="button" id="btnIncr" class="btn-icon"
                            onclick="updateItemQty(event, {{ $item['id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            Keranjang kosong.
        @endforelse
    </div>

    <script src="/assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        const container = document.querySelector(".order-section");
        const childLength = container.children.length;

        function deleteItem(e, id) {
            const itemEl = document.getElementById(`item-${id}`);
            const _itemEl = itemEl.cloneNode(true);

            itemEl.remove();

            if (container.children.length < 1) {
                container.innerHTML = `<p id="emptyCart">Keranjang kosong.</p>`;
            }

            Swal.fire({
                icon: "success",
                title: "Item berhasil dihapus!",
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: 'Batal',
                timer: 2000,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(async (result) => {
                if (result.dismiss === Swal.DismissReason.cancel) {
                    container.querySelector("#emptyCart")?.remove();

                    if (childLength > 0 && childLength - 1 !== +_itemEl.dataset.index) {
                        container.insertBefore(_itemEl, container.children[+_itemEl.dataset.index]);
                    } else {
                        container.append(_itemEl);
                    }

                    return;
                }

                if (result.isDismissed === true && result.dismiss === 'timer') {
                    try {
                        let data = {
                            _token: `{{ csrf_token() }}`
                        }

                        const res = await fetch(`/api/cart/${id}`, {
                            method: "DELETE",
                            headers: {
                                "accept": "application/json",
                                "content-type": "application/json",
                            },
                            body: JSON.stringify(data),
                            credentials: "same-origin"
                        })

                        if (!res.ok) {
                            throw new Error("Terjadi kesalahan di sisi server.");
                        }
                    } catch (e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: e.message
                        })
                    }
                }
            });
        }

        const updateItem = debounce(async (id, qty) => {
            try {
                let data = {
                    _token: `{{ csrf_token() }}`,
                    qty
                }

                const res = await fetch(`/api/cart/${id}`, {
                    method: "PUT",
                    headers: {
                        "accept": "application/json",
                        "content-type": "application/json",
                    },
                    body: JSON.stringify(data),
                    credentials: "same-origin"
                })

                if (!res.ok) {
                    throw new Error("Terjadi kesalahan di sisi server.");
                }
            } catch (e) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: e.message
                })
            }
        }, 500);

        function updateItemQty(e, id, n = 1) {
            const inputEl = document.getElementById(`amtInput-${id}`);
            const displayEl = document.getElementById(`amtDisplay-${id}`);

            let val = +inputEl.value + n;

            inputEl.value = val < 1 ? inputEl.value : val;
            displayEl.textContent = inputEl.value;
            updateItem(id, val);
        }

        function debounce(fn, delay) {
            let timeoutID;
            return function(...args) {
                if (timeoutID)
                    clearTimeout(timeoutID);
                timeoutID = setTimeout(() => {
                    fn(...args)
                }, delay);
            }
        }
    </script>
@endsection
