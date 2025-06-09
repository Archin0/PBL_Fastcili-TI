<div id="modal-master" class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content border-0 shadow-lg">
        <div class="modal-header bg-gradient-primary text-white">
            <h5 class="modal-title font-weight-bold">
                <i class="fas fa-clipboard-list mr-2"></i>Detail Data Laporan
            </h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body p-4">
            <!-- Foto Kerusakan Section -->
            <div class="text-center mb-4">
                <img src="{{ asset('storage/uploads/laporan_kerusakan/' . $laporan->laporan->foto_kerusakan) }}"
                    onerror="this.onerror=null;this.src='{{ asset('foto_kerusakan.jpg') }}';" 
                    alt="Foto Kerusakan"
                    class="img-fluid rounded shadow border" 
                    style="max-height: 300px; width: auto;">
            </div>

            <!-- Informasi Laporan Card -->
            <div class="card border-0">
                <div class="card-header bg-light">
                    <h6 class="mb-0 font-weight-bold">
                        <i class="fas fa-info-circle mr-2 text-primary"></i>Detail Laporan
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th class="text-right text-muted" style="width: 30%">Fasilitas:</th>
                                    <td>
                                        <i class="fas fa-tools mr-2 text-warning"></i>
                                        {{ $laporan->laporan->fasilitas->nama_fasilitas }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right text-muted" style="width: 30%">Lokasi:</th>
                                    <td>
                                        <i class="fas fa-building mr-2 text-danger"></i>
                                        {{ $laporan->laporan->fasilitas->ruangan->gedung->nama_gedung }} -
                                        {{ $laporan->laporan->fasilitas->ruangan->nama_ruangan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right text-muted">Deskripsi:</th>
                                    <td>
                                        <div class="bg-light p-3 rounded">
                                            <p class="mb-0">{{ $laporan->deskripsi_tambahan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right text-muted">Tanggal Lapor:</th>
                                    <td>
                                        <i class="fas fa-calendar-alt mr-2 text-info"></i>
                                        {{ $laporan->created_at->translatedFormat('l, d F Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right text-muted">Status:</th>
                                    <td>
                                        @php
                                            $statusColor = match ($laporan->laporan->id_status) {
                                                1 => 'bg-secondary text-white',
                                                2 => 'bg-info text-white',
                                                3 => 'bg-warning text-white',
                                                4 => 'bg-success text-white',
                                                default => 'bg-dark',
                                            };
                                        @endphp
                                        <span class="badge {{ $statusColor }} px-3 py-2">
                                            {{ $laporan->laporan->status->nama_status }}
                                        </span>
                                    </td>
                                </tr>
                                @if ($laporan->laporan->status->nama_status == 'Selesai')
                                    <tr>
                                        <th class="text-right text-muted">Tanggal Selesai:</th>
                                        <td>
                                            <i class="fas fa-calendar-alt mr-2 text-info"></i>
                                            {{ $laporan->laporan->tanggal_selesai->translatedFormat('l, d F Y') }}
                                        </td>
                                    </tr>
                                @endif
                               
                                <tr>
                                    <th class="text-right text-muted">Teknisi:</th>
                                    <td>
                                        @if ($laporan->laporan->penugasan)
                                        <i class="fas fa-user-tie mr-2 text-success"></i>
                                        {{ $laporan->laporan->penugasan->user->nama }}
                                        @else
                                        <i class="fas fa-user-tie mr-2 text-danger"></i>
                                        Belum ditugaskan
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th class="text-right text-muted">Rating:</th>
                                    <td class="text-danger">
                                        @if ($laporan->laporan->status->nama_status != 'Selesai')
                                            Laporan belum selesai sehingga tidak bisa di-rating
                                        @elseif ($laporan->laporan->status->nama_status == 'Selesai' && $laporan->rating_pengguna)
                                            @for ($i = 0; $i < $laporan->rating_pengguna; $i++)
                                                <span style="color: gold; font-size: 1.2rem;">&#9733;</span>
                                            @endfor
                                            ({{ $laporan->rating_pengguna }}/5)
                                        @elseif ($laporan->laporan->status->nama_status == 'Selesai')
                                            Belum di-rating
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right text-muted">Ulasan:</th>
                                    <td class="text-danger">
                                        @if ($laporan->laporan->status->nama_status != 'Selesai')
                                            Laporan belum selesai sehingga tidak bisa diulas
                                        @elseif ($laporan->laporan->status->nama_status == 'Selesai' && $laporan->feedback_pengguna)
                                            <div class="bg-light p-3 rounded">
                                                <p class="mb-0">{{ $laporan->feedback_pengguna }}</p>
                                            </div>
                                        @else
                                            Belum diulas
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary">
                <i class="fas fa-times mr-1"></i> Tutup
            </button>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #01bb1d 0%, #66ff00 100%);
    }
    .card {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
    }
    .card:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .modal-content {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
    }
    .table-borderless tbody tr td, 
    .table-borderless tbody tr th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: none;
    }
    .table-borderless tbody tr:not(:last-child) {
        border-bottom: 1px solid #eee;
    }
    .badge {
        font-size: 0.9rem;
        font-weight: 500;
    }
</style>