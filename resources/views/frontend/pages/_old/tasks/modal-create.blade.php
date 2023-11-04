<div class="modal right fade itemModal" id="createTasksModal" tabindex="-1"
     aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h4 class="bold">Создать задачу</h4>
                <div class="modal-btn">
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">


                <form class="def-form " id="tasks-create-form"
                      action="{{route('task.create')}}"
                >

                    <fieldset class="def-form-group">

                        <div class="col-md-12 mb-4">
                            <span class="label">Наименование</span>

                            <input type="text" class="form-control" name="title"
                                   value="{{$model->title ?? ""}}" placeholder="Введите название" required>
                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Исполнитель</span>


                                {!! Form::select('executor_user_id',

                                $users->pluck('fullname','id'),
                                 null,
                                ['class' => 'form-control' , 'placeholder'=> 'Выберите исполнителя']) !!}




                        </div>
                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Куратор</span>



                                {!! Form::select('curator_user_id',

                                $users->pluck('fullname','id'),
                                 null,
                                ['class' => 'form-control' , 'placeholder'=> 'Выберите куратора']) !!}


                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Дата начала</span>
                            <input type="text" class="form-control datepicker"
                                   data-provide="datepicker" name="start_date"
                                   value="{{old('start_date', isset($model->start_date) ? $model->getFormattedDate($model->start_date)  : "")}}"
                                   placeholder="Выберите дату начала" >

                        </div>
                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Дата cдачи</span>
                            <input type="text" class="form-control datepicker"
                                   data-provide="datepicker" name="end_date"
                                   value="{{old('end_date', isset($model->end_date) ? $model->getFormattedDate($model->end_date)  : "")}}"
                                   placeholder="Выберите дату cдачи" >

                        </div>

{{--                        <div class="col-md-12 mb-4 def-form-field">--}}
{{--                            <span class="label">Специальная отметка</span>--}}

{{--                            <input type="number" class="form-control" max="150" name="ready_degree"--}}
{{--                                   value="{{$model->ready_degree ?? ""}}"--}}
{{--                                   placeholder="Введите степень готовности">--}}
{{--                        </div>--}}

{{--                        <div class="col-md-12 mb-4 def-form-field">--}}
{{--                            <span class="label">пометка о выполнении задания--}}
{{--                                (дата)</span>--}}
{{--                            <input type="text" class="form-control datepicker"--}}
{{--                                   data-provide="datepicker" name="execution_mark_date"--}}
{{--                                   value="{{old('execution_mark_date', isset($model->execution_mark_date) ? $model->getFormattedDate($model->execution_mark_date)  : "")}}"--}}
{{--                                   placeholder="Выберите дату выполенения задания" >--}}

{{--                        </div>--}}

{{--                        <div class="col-md-12 mb-4 def-form-field">--}}
{{--                            <span class="label">пометка о срыве задания (дата)</span>--}}
{{--                            <input type="text" class="form-control datepicker"--}}
{{--                                   data-provide="datepicker" name="failure_mark_date"--}}
{{--                                   value="{{old('failure_mark_date', isset($model->failure_mark_date) ? $model->getFormattedDate($model->failure_mark_date)  : "")}}"--}}
{{--                                   placeholder="Выберите дату срыва задания" >--}}

{{--                        </div>--}}

{{--                        <div class="col-md-12 mb-4 def-form-field">--}}
{{--                            <span class="label">Итог - тип</span>--}}


{{--                                {!! Form::select('result_type_id',--}}

{{--                                $taskResultTypes->pluck('title','id'),--}}
{{--                                 null,--}}
{{--                                ['class' => 'form-control' , 'placeholder'=> 'Выберите тип итога']) !!}--}}



{{--                        </div>--}}

{{--                        <div class="col-md-12 mb-4 def-form-field">--}}
{{--                            <span class="label">Итог - оценка</span>--}}

{{--                            <input type="number" class="form-control" max="150" name="result_mark"--}}
{{--                                   value="{{$model->result_mark ?? ""}}" placeholder="Введите итоговую оценку">--}}
{{--                        </div>--}}

{{--                        <div class="col-md-12 mb-4 def-form-field">--}}
{{--                            <span class="label">Итог - описание</span>--}}

{{--                            <textarea  class="form-control"  name="result_desc"--}}
{{--                                       placeholder="Введите описание">{{$model->result_desc ?? ""}}</textarea>--}}
{{--                        </div>--}}





                    </fieldset>

                    <div class="def-form-submit">

                        <button class="btn btn-reg" data-def-form-submit type="submit">
                            Создать
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
