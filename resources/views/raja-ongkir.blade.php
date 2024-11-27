<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container mx-auto py-10">
    <div class="max-w-lg mx-auto bg-white shadow-xl rounded-lg p-6">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Cek Ongkos Kirim</h1>
        <div>
            <label for="originProvince" class="block font-semibold">Provinsi Asal</label>
            <select id="originProvince" class="w-full border border-gray-300 rounded-lg p-2">
                <option value="">-- Pilih Provinsi Asal --</option>
            </select>
        </div>
        <div>
            <label for="originCity" class="block font-semibold">Kota Asal</label>
            <select id="originCity" class="w-full border border-gray-300 rounded-lg p-2" disabled>
                <option value="">Pilih Kota Asal --</option>
            </select>
        </div>
        <div>
            <label for="destinationProvince" class="block font-semibold">Provinsi Tujuan</label>
            <select id="destinationProvince" class="w-full border border-gray-300 rounded-lg p-2">
                <option value="">-- Pilih Provinsi Tujuan --</option>
            </select>
        </div>
        <div>
            <label for="destinationCity" class="block font-semibold">Kota Tujuan</label>
            <select id="destinationCity" class="w-full border border-gray-300 rounded-lg p-2">
                <option value="">-- Pilih Kota Tujuan --</option>
            </select>
        </div>
        <div>
            <label for="weight" class="block font-semibold">Berat (gram)</label>
            <input type="number" id="weight" class="w-full border border-gray-300 rounded-lg p-2"
                placeholder="Masukkan berat barang (gram)">
        </div>
        <div>
            <label for="courier" class="block font-semibold">Kurir</label>
            <select id="courier" class="w-full border border-gray-300 rounded-lg p-2">
                <option value="">-- Pilih Kurir --</option>
                <option value="jne">JNE</option>
                <option value="tiki">TIKI</option>
                <option value="pos">POS Indonesia</option>
            </select>
        </div>
        <button id="checkOngkir"
            class="w-full bg-blue-600 text-white font-semibold rounded-lg py-2 hover:bg-blue-700 transition">Cek
            Ongkir</button>
        <div id="result" class="mt-6"></div>
        <div id="loading" class="hidden text-center py-4">
            <div class="flex items-center justify-center space-x-2">
                <div class="w-4 h-4 bg-blue-600 rounded-full animate-ping"></div>
                <p>Memuat data...</p>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Load provinces
                function loadProvinces(selectId) {
                    $.ajax({
                        url: "/api/rajaongkir/province",
                        method: "GET",
                        success: function(response) {
                            const provinces = response.rajaongkir.results;
                            $.each(provinces, function(index, province) {
                                $(selectId).append(
                                    `<option value="${province.province_id}">${province.province}</option>`
                                    );
                            });
                        },
                        error: function() {
                            alert("Gagal memuat data provinsi.");
                        }
                    });
                }


                loadProvinces("#originProvince");
                loadProvinces("#destinationProvince");


                // Load cities based on selected province
                $('#originProvince').on('change', function() {
                    const provinceId = $(this).val();
                    $('#originCity').prop('disabled', true).html(
                        '<option value="">-- Pilih Kota Asal --</option>');


                    if (provinceId) {
                        $.ajax({
                            url: `/api/rajaongkir/city?province=${provinceId}`,
                            method: "GET",
                            success: function(response) {
                                const cities = response.rajaongkir.results;
                                $('#originCity').prop('disabled', false);
                                $.each(cities, function(index, city) {
                                    $('#originCity').append(
                                        `<option value="${city.city_id}">${city.city_name}</option>`
                                        );
                                });
                            },
                            error: function() {
                                alert("Gagal memuat data kota.");
                            }
                        });
                    }
                });


                $('#destinationProvince').on('change', function() {
                    const provinceId = $(this).val();
                    $('#destinationCity').prop('disabled', true).html(
                        '<option value="">-- Pilih Kota Tujuan --</option>');


                    if (provinceId) {
                        $.ajax({
                            url: `/api/rajaongkir/city?province=${provinceId}`,
                            method: "GET",
                            success: function(response) {
                                const cities = response.rajaongkir.results;
                                $('#destinationCity').prop('disabled', false);
                                $.each(cities, function(index, city) {
                                    $('#destinationCity').append(
                                        `<option value="${city.city_id}">${city.city_name}</option>`
                                        );
                                });
                            },
                            error: function() {
                                alert("Gagal memuat data kota.");
                            }
                        });
                    }
                });


                // Check shipping cost
                $('#checkOngkir').on('click', function() {
                    const origin = $('#originCity').val();
                    const destination = $('#destinationCity').val();
                    const weight = $('#weight').val();
                    const courier = $('#courier').val();


                    if (!origin || !destination || !weight || !courier) {
                        alert("Mohon lengkapi semua input.");
                        return;
                    }


                    $.ajax({
                        url: "/api/rajaongkir/cost",
                        method: "POST",
                        data: {
                            origin: origin,
                            destination: destination,
                            weight: weight,
                            courier: courier
                        },
                        beforeSend: function() {
                            $('#loading').removeClass('hidden');
                            $('#result').empty();
                        },
                        success: function(response) {
                            $('#loading').addClass('hidden');
                            const results = response.rajaongkir.results[0].costs;


                            if (results.length > 0) {
                                $.each(results, function(index, cost) {
                                    $('#result').append(`
                                <div class="bg-white shadow-md rounded-lg p-4 mb-3">
                                    <h3 class="font-bold">${cost.service}</h3>
                                    <p>Deskripsi: ${cost.description}</p>
                                    <p>Biaya: Rp ${cost.cost[0].value}</p>
                                    <p>Estimasi: ${cost.cost[0].etd} hari</p>
                                </div>
                            `);
                                });
                            } else {
                                $('#result').html("<p>Tidak ada data biaya pengiriman.</p>");
                            }
                        },
                        error: function() {
                            alert("Gagal memuat data ongkos kirim.");
                        }
                    });
                });
            });
        </script>
