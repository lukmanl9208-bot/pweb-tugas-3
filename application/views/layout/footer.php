                <!-- Footer -->
                <footer class="text-center text-muted pt-3 border-top mt-auto">
                    <small>&copy; 2026 Pemrograman Web &mdash; Universitas Bumigora</small>
                </footer>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        (function () {
            var tableSelector = '#datatable';
            var tableElement = document.querySelector(tableSelector);

            if (window.jQuery && tableElement && jQuery.fn && jQuery.fn.DataTable) {
                jQuery(function ($) {
                    if (!$.fn.dataTable.isDataTable(tableSelector)) {
                        $(tableSelector).DataTable({
                            responsive: true,
                            pageLength: 10,
                            language: {
                                search: 'Cari:',
                                lengthMenu: 'Tampilkan _MENU_ data',
                                info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                                infoEmpty: 'Tidak ada data yang ditampilkan',
                                zeroRecords: 'Data tidak ditemukan',
                                paginate: {
                                    previous: 'Sebelumnya',
                                    next: 'Berikutnya'
                                }
                            }
                        });
                    }
                });
            }

            document.addEventListener('click', function (event) {
                var deleteButton = event.target.closest('.btn-hapus');

                if (!deleteButton) {
                    return;
                }

                event.preventDefault();

                if (typeof Swal === 'undefined') {
                    window.location.href = deleteButton.getAttribute('href');
                    return;
                }

                Swal.fire({
                    title: 'Hapus data ini?',
                    text: 'Data yang sudah dihapus tidak bisa dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then(function (result) {
                    if (result.isConfirmed) {
                        window.location.href = deleteButton.getAttribute('href');
                    }
                });
            });

            // Password toggle functionality
            document.addEventListener('click', function (event) {
                var toggleButton = event.target.closest('.btn-toggle-password');
                if (!toggleButton) {
                    return;
                }

                var passwordInput = toggleButton.closest('.input-group').querySelector('input[type="password"], input[type="text"]');
                if (!passwordInput) {
                    return;
                }

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
                } else {
                    passwordInput.type = 'password';
                    toggleButton.innerHTML = '<i class="bi bi-eye"></i>';
                }
            });
        })();
    </script>
    <?php $swal = $this->session->flashdata('swal'); ?>
    <?php if ($swal || $this->session->flashdata('success') || $this->session->flashdata('warning')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if ($swal): ?>
                Swal.fire(<?php echo json_encode($swal) ?>);
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: '<?php echo addslashes($this->session->flashdata('success')) ?>'
                });
            <?php endif; ?>

            <?php if ($this->session->flashdata('warning')): ?>
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: '<?php echo addslashes($this->session->flashdata('warning')) ?>'
                });
            <?php endif; ?>
        });
    </script>
    <?php endif; ?>
</body>
</html>