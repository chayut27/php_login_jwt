<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="" class="bg-light">


    <div id="app">
        <div class="container p-md-5">
            <div class="row">
                <div class="col-md-6 mt-5" v-if="Object.keys(users_chooser).length > 0">
                    <h2 class="mb-0">Recent logins</h2>
                    <p class="text-muted">Click your picture or add an account.</p>
                    <div class="row">
                        <div class="col-4 col-md-3 mb-3" v-for="user in users_chooser" :key="user.user_id">
                            <div class="card card-login-chooser" v-bind:title="user.username">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 left-0"
                                    v-on:click="remove(user)">X</button>
                                <div class="card-body text-center p-0" v-on:click="current_modal(user);">
                                    <img src="https://image.flaticon.com/icons/png/512/14/14660.png"
                                        class="card-img-top p-4" alt="...">
                                    <h6 class="card-title p-3 text-truncate">{{user.username}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="card card-login-chooser" title="Add Account" v-on:click="add_modal();">
                                <div class="bg-light">
                                    <img src="https://image.flaticon.com/icons/png/512/64/64522.png"
                                        class="card-img-top p-4 p-md-5" alt="...">
                                </div>

                                <div class="card-body text-center p-0 text-primary ">
                                    <h6 class="card-title p-3 text-truncate">Add Account</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="do_login.php" method="POST">
                                <div class="text-center mb-4">
                                    <h1 class="h3 mb-3 font-weight-normal">Hello World</h1>
                                </div>

                                <div class="mb-3">
                                    <input type="text" id="username" name="username"
                                        class="form-control form-control-lg" placeholder="Username" required autofocus>
                                </div>

                                <div class="mb-3">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Password" required>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="current_modal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="contianer">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="row">
                                        <div class="col-6 col-md-5 mx-auto">
                                            <img src="https://image.flaticon.com/icons/png/512/14/14660.png"
                                                class="img-fluid rounded-circle mb-2" alt="">
                                        </div>
                                    </div>
                                    <h4 class="mb-3 text-truncate">{{current_username}}</h4>
                                    <form action="do_login.php" id="formCurrent" method="POST">
                                        <div class="mb-3">
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-lg" placeholder="Password" required
                                                autofocus>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                                        <input type="hidden" id="username" name="username" v-model="current_username">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="add_acc_Modal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hello World</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="do_login.php" id="formAddAcc" method="POST">
                            <div class="mb-3">
                                <input type="text" id="username" name="username" class="form-control form-control-lg"
                                    placeholder="Username" required autofocus>
                            </div>

                            <div class="mb-3">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" placeholder="Password" required>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
        integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"
        integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"
        integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg=="
        crossorigin="anonymous"></script>

    <script>
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        const app = {
            data() {
                return {
                    users_chooser: [],
                    current_user_id: '',
                    current_username: '',
                    showModal: false,
                    addAccModal: false
                }
            },
            mounted() {
                var vue = this;
                this.get_users_chooser();
                var currentModal = document.getElementById('current_modal')
                currentModal.addEventListener('hidden.bs.modal', function (e) {
                    vue.current_username = [];
                    document.getElementById("formCurrent").reset();
                })
                var addaccModal = document.getElementById('add_acc_Modal')
                addaccModal.addEventListener('hidden.bs.modal', function (e) {
                    document.getElementById("formAddAcc").reset();
                })
            },
            methods: {
                get_users_chooser() {
                    var obj = JSON.parse(atob(decodeURIComponent(getCookie('users_chooser'))));
                    this.users_chooser = obj;
                },
                remove(user) {

                    axios.get('./doing.php?act=remove_user_chooser&user_id=' + user.user_id)
                        .then(function (response) {
                            vue.get_users_chooser();
                        })
                },
                current_modal(user) {
                    this.current_username = user.username;
                    var myModal = new bootstrap.Modal(document.getElementById("current_modal"), {});
                    myModal.show();
                },
                add_modal() {
                    var myModal = new bootstrap.Modal(document.getElementById("add_acc_Modal"), {});
                    myModal.show();
                }
            }
        }

        Vue.createApp(app).mount('#app')
    </script>
</body>

</html>