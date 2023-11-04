<div class="modal right fade itemModal" id="updateTasksModal-{{$task->id}}" tabindex="-1"
     aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h4 class="bold">Редактировать задачу</h4>
                <div class="modal-btn">
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">


                <form class="def-form tasks-update-form" id="tasks-update-form-{{$task->id}}"
                      action="{{route('task.update',$task->id)}}"
                >

                    <fieldset class="def-form-group">

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Исполнитель</span>
                                {!! Form::select('executor_user_id',
                                $users->pluck('fullname','id'),
                                $task->executor_user_id,
                                 ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Куратор</span>
                                {!! Form::select('curator_user_id',
                                $users->pluck('fullname','id'),
                                $task->curator_user_id,

                                 ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Дата начала</span>
                            <input type="text" class="form-control datepicker"
                                   data-provide="datepicker" name="start_date"
                                   value="{{old('start_date', isset($task->start_date) ? $task->getFormattedDate($task->start_date)  : "")}}"
                                   placeholder="Выберите дату начала" >

                        </div>
                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Дата cдачи</span>
                            <input type="text" class="form-control datepicker"
                                   data-provide="datepicker" name="end_date"
                                   value="{{old('end_date', isset($task->end_date) ? $task->getFormattedDate($task->end_date)  : "")}}"
                                   placeholder="Выберите дату cдачи" >

                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Степень готовности</span>

                            <input type="number" class="form-control" max="100" name="ready_degree"
                                   value="{{$task->ready_degree ?? ""}}"
                                   id="ready_degree"
                                   placeholder="Введите степень готовности">
                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Пометка о выполнении задания
                                (дата)</span>
                            <input type="text" class="form-control datepicker"
                                   data-provide="datepicker" name="execution_mark_date"
                                   value="{{old('execution_mark_date', isset($task->execution_mark_date) ? $task->getFormattedDate($task->execution_mark_date)  : "")}}"
                                   placeholder="Выберите дату выполенения задания" >

                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Пометка о срыве задания (дата)</span>
                            <input type="text" class="form-control datepicker"
                                   data-provide="datepicker" name="failure_mark_date"
                                   value="{{old('failure_mark_date', isset($task->failure_mark_date) ? $task->getFormattedDate($task->failure_mark_date)  : "")}}"
                                   placeholder="Выберите дату срыва задания" >
                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Итог - тип</span>
                                {!! Form::select('result_type_id',
                                $taskResultTypes->pluck('title','id'),
                                $task->result_type_id,

                                 ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Итог - оценка</span>

                            <input type="number" class="form-control" max="150" name="result_mark"
                                   value="{{$task->result_mark ?? ""}}" placeholder="Введите итоговую оценку">
                        </div>

                        <div class="col-md-12 mb-4 def-form-field">
                            <span class="label">Итог - резюме</span>

                            <textarea  class="form-control"  name="result_desc"
                                       placeholder="Введите описание">{{$task->result_desc ?? ""}}</textarea>
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
