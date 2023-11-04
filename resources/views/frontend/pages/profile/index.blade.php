@extends('frontend._layouts.app')

@section('content')
    <div class="section section_profile">
        <div class="container">
            <div class="row profile">
                <div class="col-10 col-sm-5 col-md-4 col-lg-3">
                    <div class="profile-img">
                        <img src="{{$user->getPhoto()}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-sm-7 col-md-8 col-lg-9">
                    <div class="profile-info">
                        <h3 class="profile-item--fullname">
                            <span>  {{$user->fullname}}</span>
                        </h3>


                        <div class="card p-2">
                            @if(auth()->user()->id === $user->id && Route::is('profile'))
                                <a class="position-absolute  btn-reg"
                                   data-bs-toggle="modal"
                                   data-bs-target="#profileInfoUpdateModal"
                                   style="right: 4px; top:4px; cursor:pointer;">
                                    <i class="fas fa-edit "> </i></a>
                            @endif

                            <div class="profile-info-study profile-item--about_me_desc">О себе:
                                <span>{{!is_null($user->about_me_desc) ? $user->about_me_desc : 'не заполнено'}} </span>
                            </div>

                            <div class="profile-item--age">

                                Возраст: <span>{{!is_null($user->age) ? $user->age : '18'}}</span>
                            </div>
                            <div class="profile-info">

                                Статус: <span>{{!is_null($user->status) ?  $user->status : 'не заполнено'}}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(auth()->user()->id === $user->id && Route::is('profile'))
        <div class="modal right fade itemModal" id="profileInfoUpdateModal" tabindex="-1"
             aria-labelledby="itemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <h4 class="bold">Редактировать </h4>
                        <div class="modal-btn">
                            <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="modal-body">


                        <form class="def-form " id="profile-info-update-form"
                              action="{{route('profile.info.update',$user->id)}}"
                        >

                            <fieldset class="def-form-group def-form-field">

                                <div class="col-md-12 mb-4 def-form-field">

                                    <span class="label">Имя</span>

                                    <input type="text" class="form-control" name="fullname"
                                           value="{{$user->fullname ?? ""}}"
                                           placeholder="Введите имя">

                                </div>
                                <div class="col-md-12 mb-4 def-form-field">

                                    <span class="label">Возраст</span>

                                    <input type="number" class="form-control" name="age"
                                           value="{{$user->age ?? ""}}"
                                           placeholder="Введите возраст">

                                </div>


                                <div class="col-md-12 mb-4 def-form-field">

                                    <span class="label">Информация о себе</span>

                                    <textarea type="text" class="form-control" name="about_me_desc"
                                              placeholder="Введите информацию о себе">{{$user->about_me_desc ?? ""}}</textarea>
                                </div>

                            </fieldset>

                            <div class="def-form-submit">

                                <button class="btn btn-reg" data-def-form-submit type="submit">
                                    Обновить
                                </button>

                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
