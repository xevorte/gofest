<link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url(frontend/images/login2.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .body,
    .row {
        min-height: 100vh;
    }

    .card {
        border-radius: 20px;
        box-shadow: 0 20px 200px #c9c8d8;
        min-height: 90vh;
    }

    .card-body {
        padding: 50px 70px;
    }

    label {
        font-size: 13px;
    }

    input {
        font-size: 14px !important;
    }

    input::placeholder {
        color: #b3b2c2 !important;
    }

    .remember {
        margin-top: 5px;
        background-color: #e6e6f3;
    }

    @media screen and (max-width: 576px) {
        .card {
            min-height: 100vh;
        }

        .card-body {
            padding: 40px;
        }
    }

</style>
