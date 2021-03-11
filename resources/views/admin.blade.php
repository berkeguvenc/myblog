<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gezgin | Yönetim Paneli</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Turk Script -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "order": [[4,"desc"]],
                "language": {
                    "sDecimal": ",",
                    "sEmptyTable": "Tabloda herhangi bir veri mevcut değil",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoEmpty": "Kayıt yok",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing": "İşleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                    },
                    "select": {
                        "rows": {
                            "_": "%d kayıt seçildi",
                            "1": "1 kayıt seçildi"
                        }
                    }
                }
            });
        });
    </script>

    <!-- Ek tasarım kodları  -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/dashboard/dashboard.css') }}" rel="stylesheet">

</head>

<body>
@include("sidebar")
<!-- Sol panel  -->
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('admin.index')}}">
                            <span data-feather="home"></span>
                            Yönetim Paneli
                        </a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('admin.index')}}">
                            <span data-feather="edit"></span>
                            Site Bilgilerini Düzenle
                        </a>
                    </li>
                    -->

                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Blog</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="book"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.blog.index')}}">
                            <span data-feather="file-text"></span>
                            Blog Liste
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.blog.create')}}">
                            <span data-feather="file-plus"></span>
                            Blog Ekle
                        </a>
                    </li>

                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Kategoriler</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="list"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.category.index')}}">
                            <span data-feather="file-text"></span>
                            Kategori Liste
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.category.create')}}">
                            <span data-feather="file-plus"></span>
                            Kategori Ekle
                        </a>
                    </li>

                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Ayarlar</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="settings"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span data-feather="log-out"></span>
                            Çıkış Yap
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

<!-- Logo Kütüphanesi -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>

<!--  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>

<!-- Özel Java Script -->
<script src="{{ asset('assets/dashboard/dashboard.js') }}"></script>
</body>

</html>
