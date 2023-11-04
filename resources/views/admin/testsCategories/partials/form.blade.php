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
                                    <h5 class="f-16 font-weight-bold d-inline-block">Описание</h5>

                                    <textarea type="text" class="form-control" name="desc"
                                          placeholder="Введите описание"> {{$model->desc ?? ""}}
                                        </textarea>
                                </div>
                            </div>


                        </div>


                        <div class="col-sm-6 col-md-5">

                        </div>


                    </div>


                    @if(Request::is('*edit'))
                        <button class="btn bg-green btn-lg btn-block" type="submit">Сохранить Изменения</button>


                    @else
                        <button class="btn bg-green btn-lg btn-block" type="submit">Сохранить</button>

                    @endif

                </div>


            </div>
        </div>


    </div>
</div>
