@extends('frontend._layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">Регистрация</div>

                        <div class="card-body">
                            <form method="POST" class="formRegistration" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="fullname" class="col-md-4 col-form-label text-md-end">Имя</label>

                                    <div class="col-md-5">
                                        <input id="fullname" type="text"
                                               class="form-control @error('fullname') is-invalid @enderror"
                                               name="fullname" value="{{ old('fullname') }}" required
                                               autocomplete="name" autofocus>

                                        @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Емайл</label>

                                    <div class="col-md-5">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>

                                    <div class="col-md-5">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Повторите
                                        Пароль</label>

                                    <div class="col-md-5">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="age" class="col-md-4 col-form-label text-md-end">Возраст</label>

                                    <div class="col-md-2">
                                        <input id="age" type="number"
                                               class="form-control @error('age') is-invalid @enderror" name="age"
                                               value="{{ old('age') }}" autocomplete="name">

                                        @error('age')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="status" class="col-md-4 col-form-label text-md-end">Ваш Статус</label>

                                    <div class="col-md-4">

                                        <select class="form-control" name="status">
                                            {{--                                            <option :selected="true" value="empty"> Выбирите тип ответа</option>--}}
                                            @foreach ($statuses as $item)

                                                <option
                                                    value="{{$item->name}}"
                                                >
                                                    {{  $item->value}}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 col-form-label text-md-end"></div>

                                    <div class="col-md-7">

                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">

                                                <button type="button" class="btn ms-3 btn-primary"  data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                    Соглашаюсь на обработку персональных данных
                                                </button>

                                            </label>
                                        </div>
                                        <span class="d-none agree-alert text-danger">Нужно ваше соглашение</span>

                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-5 offset-md-4">
                                        <button type="submit" class="btn btn-big btn-reg bg-blue">
                                            Зарегистрироваться
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-header mb-5">
                    <h5 class="modal-title" id="exampleModalLabel">Соглашение об обработке персональных данных</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <ol>
                        <li> 1. Персональные данные пользователя обрабатываются в соответствии с Законом Республики Молдова от 8 июля 2011 года № 133 «О защите персональных данных» (ст.29 – 33).
                        </li>
                        <li> 2. При оставлении комментария или отправке сообщения через форму обратной связи,
                            пользователь предоставляет свои имя и электронную почту.
                        </li>
                        <li> 3. Предоставляя свои персональные данные, пользователь соглашается на их обработку сайтом в
                            целях получения ответа на комментарий или сообщение через форму обратной связи.
                        </li>
                        <li> 4. По запросу пользователя, его персональные данные могут быть удалены сайтом.
                        </li>
                        <li> 5. Персональные данные пользователя не станут доступны третьим лицам.
                        </li>

                    </ol>


                    Я осознаю, что «Даю согласие на обработку персональных данных» на сайте означает мое письменное
                    согласие с изложенными выше условиями.

                </div>

                <button class="btn btn-big text-white agree-btn"  style="background-color: #14798f;">Соглашаюсь</button>


            </div>
        </div>
    </div>

@endsection


@push('js-after-app')

    <script>
        const agreeBtn = $('.agree-btn')
        const checkbox = $('#flexCheckChecked')


        const btnReg = $('.btn-reg')

        // $('.formRegistration').submit(function (e) {
        //     e.preventDefault()
        //
        //
        // })

        btnReg.click(function (e) {
           e.preventDefault()

            if($('#flexCheckChecked').prop('checked')){
                $('.formRegistration').submit()
            }else{
                $('.agree-alert').removeClass('d-none')
            }
        })

        agreeBtn.click(function () {
            checkbox.prop('checked', true)
            $('#exampleModal').modal('hide');
        })
    </script>

@endpush
