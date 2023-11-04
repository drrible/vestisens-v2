<div id="wrapper">
    <div class="create_edit-content bg-light">
        <div class="container">
            <div class="row justify-content-center  py-3">


                <div class="col-12 col-md-12 col-lg-9 mt-5">
                    <div class="row justify-content-center mb-3">
                        <div class="col-sm-6 col-md-7">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Наименование</h5>

                                    <input type="text" class="form-control" name="title"
                                           value="{{$model->title ?? ""}}" placeholder="Введите наименование">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Категория</h5>


                                    @if(Request::is('*edit'))

                                        {!! Form::select('category_id',
                                        $categories->pluck('title','id'),
                                        $model->category_id,

                                         ['class' => 'form-control']) !!}

                                    @else

                                        {!! Form::select('category_id',

                                        $categories->pluck('title','id'),
                                         null,
                                        ['class' => 'form-control' , 'placeholder'=> 'Выберите категорию']) !!}
                                    @endif
                                </div>


                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Короткий текст</h5>

                                    <textarea type="text" class="form-control" name="text_short"
                                              placeholder="Введите текст решения">{{$model->text_short ?? ""}} </textarea>
                                </div>


                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Полный текст</h5>

                                    <label for="text-2"></label>
                                    <textarea id="text-2" class="form-control my-editor" name="text_full"
                                              placeholder="Введите полный текст">{{$model->text_full ?? ""}} </textarea>
                                </div>


                            </div>


                        </div>


                        <div class="col-sm-6 col-md-5">

                            <div class="form-group">
                                <div class="col-md-12 mb-4">
                                    @if(Request::is('*edit'))

                                        <h5 class="f-16 font-weight-bold d-inline-block ">Картинка</h5>

                                        <div class="photo-container">

                                            <div class="photo-upload-container">
                                                <div class="photo"><img style="width: 375px"
                                                                        src="{{$model->getPhoto()}}" alt=""></div>

                                                <label for="file-photo">Нажмите чтобы изменить картинку</label>
                                                <input type="file" id="file-photo" name="photo">


                                            </div>
                                        </div>

                                    @else
                                        <h5 class="f-16 font-weight-bold d-inline-block ">Картинка</h5>

                                        <div class="photo-container">

                                            <div class="photo-upload-container">
                                                <label for="file-photo">Нажмите чтобы добавить фото</label>
                                                <input type="file" id="file-photo" name="photo">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Дата публикации</h5>
                                    <input type="text" class="form-control datepicker"
                                           data-provide="datepicker" name="pub_date"
                                           value="{{old('pub_date', isset($model->pub_date) ? $model->getFrontDate($model->pub_date)  : "")}}"
                                           placeholder="Выберите дату публикации" required>

                                </div>

                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Отобразить новость</h5>


                                    @if(Request::is('*edit'))

                                        {!! Form::select('show',
                                       ['1'=> 'Показать', '0'=> 'Скрыть'],
                                        $model->show,

                                         ['class' => 'form-control']) !!}

                                    @else

                                        {!! Form::select('category_id',

                                        ['1'=> 'Показать', '0'=> 'Скрыть'],
                                         1,
                                        ['class' => 'form-control' , 'placeholder'=> 'Показать']) !!}
                                    @endif
                                </div>


                            </div>

                        </div>


                    </div>


                    @if(Request::is('*edit'))
                        <button class="btn bg-green btn-lg btn-block" type="submit">Сохранить Изменения</button>

                        {{--                        <div class="show-btns">--}}
                        {{--                            <button class="btn bg-green-ico " type="submit" data-toggle="tooltip" data-placement="left"--}}
                        {{--                                    title="Сохранить изменения"><i class="fas fa-save "></i></button>--}}
                        {{--                        </div>--}}

                    @else
                        <button class="btn bg-green btn-lg btn-block" type="submit">Сохранить</button>

                    @endif

                </div>


            </div>
        </div>


    </div>
</div>
