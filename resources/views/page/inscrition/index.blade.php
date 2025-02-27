<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inscription</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">KAYY BOOK NATT</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('inscription.register')}}" >
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="prenom" class="form-control form-control-user" placeholder="Prénom" value="{{old('prenom')}}">
                                        @error('prenom')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="nom" placeholder="Nom" value="{{old('nom')}}" >
                                        @error('nom')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email" value="{{old('email')}}">
                                    @error('email')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-user" name="telephone" placeholder="Téléphone" value="{{old('telephone')}}">
                                    @error('telephone')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="dateNaissance" placeholder="Date de naissance" value="{{old('dateNaissance')}}">
                                    @error('dateNaissance')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="numeroCni" placeholder="Numéro CNI" value="{{old('numeroCni')}}" >
                                    @error('numeroCni')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="adresse" placeholder="Adresse" value="{{old('adresse')}}" >
                                    @error('adresse')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Mot de passe" >
                                        @error('password')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Confirmer le mot de passe" >
                                        @error('password_confirmation')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    S'inscrire
                                </button>
                            </form>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>
</body>
</html>
