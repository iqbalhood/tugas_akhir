app.controller('PenggunaCtrl', function ($scope, $cookies, $ngConfirm, $interval, $http, $route, $timeout, $routeParams, $window) {
    
    
    var favoriteCookie = $cookies.get('cookieval');
    $scope.userid = favoriteCookie;


    $http.get("../apidb/pengguna/list_data.php").then(function (response) {
        $scope.myData = response.data.event;
    });


  

    $scope.addPengguna = function () {
        $ngConfirm({
            title: 'Tambah Pengguna',
            columnClass: 'col-md-8 col-md-offset-2',
            contentUrl: '../admin/form/pengguna.html',
            scope: $scope,
            buttons: {
                simpan: {
                    text: 'Simpan',
                    btnClass: 'btn-blue',
                    action: function (scope, button) {
                        if ($scope.nip && $scope.nama && $scope.password
                            && $scope.alamat && $scope.telpon && $scope.jenis_kelamin
                            && $scope.tempat_lahir && $scope.tanggal_lahir && $scope.level
                            && $scope.status && $scope.blokir
                        ) {
                            $http({
                                method: 'POST',
                                url: '../apidb/pengguna/add_pengguna.php',
                                data: {
                                    nip: $scope.nip,
                                    nama: $scope.nama,
                                    password: $scope.password,
                                    alamat: $scope.alamat,
                                    telpon: $scope.telpon,
                                    jenis_kelamin: $scope.jenis_kelamin,
                                    tempat_lahir: $scope.tempat_lahir,
                                    tanggal_lahir: $scope.tanggal_lahir,
                                    level: $scope.level,
                                    status: $scope.status,
                                    blokir: $scope.blokir,
                                    userid: $scope.userid
                                }

                            }).then(function (response) {
                                // on success
                                console.log(response);
                                if (response.status == 200) {
                                    $scope.nip = "";
                                    $scope.nama = "";
                                    $scope.password = "";
                                    $scope.alamat = "";
                                    $scope.telpon = "";
                                    $scope.jenis_kelamin = "";
                                    $scope.tempat_lahir = "";
                                    $scope.tanggal_lahir = "";
                                    $scope.level = "";
                                    $scope.status = "";
                                    $scope.blokir = "";
                                    $route.reload();
                                }

                            });
                        }
                        else {
                            $ngConfirm('Data Yang Anda Input Belum Lengkap !');
                            return false;
                        }
                    }
                },
                batal: function (scope, button) {
                    $scope.nip = "";
                    $scope.nama = "";
                    $scope.password = "";
                    $scope.alamat = "";
                    $scope.telpon = "";
                    $scope.jenis_kelamin = "";
                    $scope.tempat_lahir = "";
                    $scope.tanggal_lahir = "";
                    $scope.level = "";
                    $scope.status = "";
                    $scope.blokir = "";
                    // closes the modal
                },
            }
        });
    };

    $scope.editPengguna = function (x) {
        $scope.nip = x.nip;
        $scope.nama = x.nama;
        $scope.alamat = x.alamat;
        $scope.alamat = x.alamat;
        $scope.telpon = x.telpon;
        $scope.jenis_kelamin = x.jenis_kelamin;
        $scope.tempat_lahir = x.tempat_lahir;
        $scope.tanggal_lahir = x.tanggal_lahir;
        $scope.level = x.level;
        $scope.status = x.status;
        $scope.blokir = x.blokir;

        $ngConfirm({
            title: 'Edit Pengguna',
            columnClass: 'col-md-8 col-md-offset-2',
            contentUrl: '../admin/form/editpengguna.html',
            scope: $scope,
            buttons: {
                simpan: {
                    text: 'Simpan',
                    btnClass: 'btn-blue',
                    action: function (scope, button) {

                        if ($scope.nip && $scope.nama
                            && $scope.alamat && $scope.telpon && $scope.jenis_kelamin
                            && $scope.tempat_lahir && $scope.tanggal_lahir && $scope.level
                            && $scope.status && $scope.blokir
                        ) {
                            $http({
                                method: 'POST',
                                url: '../apidb/pengguna/edit_pengguna.php',
                                data: {
                                    nip: $scope.nip,
                                    nama: $scope.nama,
                                    password: $scope.password,
                                    alamat: $scope.alamat,
                                    telpon: $scope.telpon,
                                    jenis_kelamin: $scope.jenis_kelamin,
                                    tempat_lahir: $scope.tempat_lahir,
                                    tanggal_lahir: $scope.tanggal_lahir,
                                    level: $scope.level,
                                    status: $scope.status,
                                    blokir: $scope.blokir,
                                    userid: $scope.userid
                                }

                            }).then(function (response) {
                                // on success
                                console.log(response);
                                //console.log(response);
                                if (response.status == 200) {
                                    $scope.nip = "";
                                    $scope.nama = "";
                                    $scope.password = "";
                                    $scope.alamat = "";
                                    $scope.telpon = "";
                                    $scope.jenis_kelamin = "";
                                    $scope.tempat_lahir = "";
                                    $scope.tanggal_lahir = "";
                                    $scope.level = "";
                                    $scope.status = "";
                                    $scope.blokir = "";
                                    $route.reload();
                                }

                            });

                        } else {
                            $ngConfirm('Data Yang Anda Input Belum Lengkap !');
                            return false;
                        }
                    }
                },
                batal: function (scope, button) {

                    $scope.nip = "";
                    $scope.nama = "";
                    $scope.password = "";
                    $scope.alamat = "";
                    $scope.telpon = "";
                    $scope.jenis_kelamin = "";
                    $scope.tempat_lahir = "";
                    $scope.tanggal_lahir = "";
                    $scope.level = "";
                    $scope.status = "";
                    $scope.blokir = "";
                    $route.reload();

                },
            }
        });
    };


    $scope.deletePengguna = function (x) {

        $scope.nip = x.nip;


        $ngConfirm({
            title: 'Konfirmasi!',
            content: 'Apakah anda yakin akan menghapus data?',
            scope: $scope,
            buttons: {
                sayBoo: {
                    text: 'Ya',
                    btnClass: 'btn-blue',
                    action: function (scope, button) {
                        $http({
                            method: 'POST',
                            url: '../apidb/pengguna/delete_pengguna.php',
                            data: { nip: $scope.nip, userid: $scope.userid, }

                        }).then(function (response) {
                            // on success
                            //console.log(response);
                            console.log(response.data);
                            if (response.status == 200) {

                                $route.reload();
                            }

                        });


                    }
                },
                close: {
                    text: 'Tidak',
                    btnClass: 'btn-red',
                    action: function (scope, button) {
                        // closes the modal
                    }
                },
            }
        });

    };






});