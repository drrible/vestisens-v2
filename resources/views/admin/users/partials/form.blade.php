<div id="wrapper">
    <div class="create_edit-content bg-light">
        <div class="container">
            <div class="row justify-content-center  py-3">


                <div class="col-12 col-md-12 col-lg-9 mt-5">
                    <div class="row justify-content-center mb-3">
                        <div class="col-sm-6 col-md-7">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Nickname</h5>

                                    <input type="text" class="form-control" name="fullname"
                                           value="{{$user->fullname ?? ""}}" placeholder="Введите nickname">
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label class="f-16 font-weight-bold">Емайл</label>
                                    <input type="text" class="form-control" name="email" placeholder="Введите e-mail"
                                           value="{{$user->email ?? ""}}" required>
                                </div>


                                <div class="col-md-12 mb-4">
                                    <label class="f-16 font-weight-bold">Пароль</label>
                                    <input type="text" class="form-control" name="password"
                                           placeholder="Введите пароль">

                                </div>


                                <div class="dropdown-divider"></div>






                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Роль</h5>
                                    @if(Request::is('*edit'))

                                        {!! Form::select('role',
                                       ['1' => 'base','2' => 'admin',],
                                        !is_null($user->role) ? $user->role : null ,

                                         ['class' => 'form-control']) !!}

                                    @else

                                        {!! Form::select('role',

                                         ['1' => 'base','2' => 'admin'],
                                         null,
                                        ['class' => 'form-control' , 'placeholder'=> 'Выберите роль']) !!}
                                    @endif


                                </div>

                            </div>


                        </div>


                        <div class="col-sm-6 col-md-5">

                            <div class="form-group">


                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Информация о пользователе</h5>

                                    <textarea type="text" rows="10" class="form-control" name="about_me_desc"
                                          placeholder="Введите информацию о сотруднике" >{{$user->about_me_desc ?? ""}}</textarea>
                                </div>


                            </div>

                        </div>


                    </div>


{{--                    @if(Request::is('*edit'))--}}
{{--                        <button class="btn bg-green btn-lg btn-block" type="submit">Сохранить Изменения</button>--}}

{{--                        <div class="show-btns">--}}
{{--                            <button class="btn bg-green-ico " type="submit" data-toggle="tooltip" data-placement="left"--}}
{{--                                    title="Сохранить изменения"><i class="fas fa-save "></i></button>--}}
{{--                        </div>--}}

{{--                    @else--}}
                        <button class="btn bg-green btn-lg btn-block" type="submit">Сохранить</button>

{{--                    @endif--}}

                </div>


            </div>
        </div>


    </div>
</div>


{{--                         !!!!!!!!!!!!!           пример--}}

{{--                                    <div class="form-group">--}}

{{--                                        @if(Request::is('*edit'))--}}

{{--                                            {!! Form::select('master_spec_id',--}}
{{--                                            $mspecs->pluck('cod_title','id'),--}}
{{--                                            $masterat->getMspecID(),--}}
{{--    --}}
{{--                                             ['class' => 'form-control']) !!}--}}

{{--                                        @else--}}

{{--                                            {!! Form::select('master_spec_id',--}}
{{--    --}}
{{--                                             $mspecs->pluck('cod_title','id'),--}}
{{--                                             null,--}}
{{--                                            ['class' => 'form-control']) !!}--}}
{{--                                        @endif--}}


{{--                                    </div>--}}
