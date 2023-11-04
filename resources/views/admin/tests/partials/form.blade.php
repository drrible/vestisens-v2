<div id="wrapper">
    <div class="create_edit-content bg-light">
        <div class="container">
            <div class="row justify-content-center  py-3">


                <div class="col-12 col-md-12 col-lg-9 mt-5">
                    <div class="row justify-content-center mb-3">
                        <div class="col-sm-6 col-md-12">
                            <div class="row">

                                <button class="btn bg-green btn-lg btn-block mb-2" type="submit">Сохранить</button>


                                <div class="row">

                                    <div class="col-md-6">
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
                                            <h5 class="f-16 font-weight-bold d-inline-block">Опубликовать</h5>


                                            @if(Request::is('*edit'))

                                                {!! Form::select('published',
                                               ['1'=> 'Показать', '0'=> 'Скрыть'],
                                                $model->published,

                                                 ['class' => 'form-control']) !!}

                                            @else

                                                {!! Form::select('published',

                                                ['1'=> 'Показать', '0'=> 'Скрыть'],
                                                 '1',
                                                ['class' => 'form-control' ]) !!}
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <div class="col-md-12 mb-4">
                                                @if(Request::is('*edit'))

                                                    <h5 class="f-16 font-weight-bold d-inline-block ">Картинка</h5>

                                                    <div class="photo-container">

                                                        <div class="photo-upload-container">
                                                            <div class="photo"><img style="width: 375px"
                                                                                    src="{{$model->getPhoto()}}" alt="">
                                                            </div>

                                                            <label for="file-photo">Нажмите чтобы изменить
                                                                картинку</label>
                                                            <input type="file" id="file-photo" name="photo">


                                                        </div>
                                                    </div>

                                                @else
                                                    <h5 class="f-16 font-weight-bold d-inline-block ">Картинка</h5>

                                                    <div class="photo-container">

                                                        <div class="photo-upload-container">
                                                            <label for="file-photo">Нажмите чтобы добавить фото</label>
                                                            <input type="file" id="file-photo" name="photo" accept="image/*">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>


                                        </div>

                                    </div>


                                </div>


                                <div class="col-md-12 mb-4">
                                    <h5 class="f-16 font-weight-bold d-inline-block">Полный текст</h5>

                                    <label for="text-2"></label>
                                    <textarea id="text-2" class="form-control my-editor" name="content"
                                              placeholder="Введите полный текст">{{$model->content ?? ""}} </textarea>
                                </div>

                                <h5 class="f-20 font-weight-bold d-inline-block mb-3">Вопросы и ответы</h5>
                                <div class="row" id="questions-app">

                                    <div class="col-md-6 mb-4">
                                        <h5 class="f-16 font-weight-bold d-inline-block">Тип ответа для пользователя</h5>


                                        <select class="form-control" name="answer_input_type"  v-model="answerInputType">
{{--                                            <option :selected="true" value="empty"> Выбирите тип ответа</option>--}}
                                            @foreach ($resultTypes as $key => $item)

                                                <option
                                                    value="{{$key}}"
                                                >
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>

                                        {{--                                        --}}
                                        {{--                                        @if(Request::is('*edit'))--}}

                                        {{--                                            {!! Form::select('result_type',--}}

                                        {{--                                            $resultTypes,--}}
                                        {{--                                            $model->result_type,--}}

                                        {{--                                             ['class' => 'form-control']) !!}--}}

                                        {{--                                        @else--}}

                                        {{--                                            {!! Form::select('result_type',--}}

                                        {{--                                             $resultTypes ,--}}
                                        {{--                                             1,--}}
                                        {{--                                            ['class' => 'form-control' , 'placeholder'=> 'Тип результата']) !!}--}}
                                        {{--                                        @endif--}}

                                    </div>

                                    <div class="row" v-show="canAddTest">
                                        <div class="col-md-6 mb-4">
                                            <h5 class="f-18 font-weight-bold d-inline-block mb-3">Вопросы</h5>

                                            <div id="questions-wrap"
                                                 >

                                                <input type="hidden" ref="questionsEl" name="questions">


                                                <div class="questions-list">

                                                    <div v-for="(item, key) in questions"
                                                         class="mb-2 questions-item-wrap w-100 df">
                                                        <div class="questions-item w-100 ">

                                                            <h5 class="f-16">Вопрос № @{{key +1}}</h5>

                                                            <div class="">
                                                                <input class="form-control" type="text" v-model="item.title"
                                                                       placeholder="Введите наименование">

                                                                <template v-if="canAddImage">
                                                                    <template v-if="item?.image">
                                                                        <img style="max-width: 360px;" :src="item.image" alt="">
                                                                    </template>

                                                                    <input class="form-control" type="file"
                                                                           :name="'image-questions['+key+']'"
                                                                           accept="image/*"
                                                                    >
                                                                </template>


                                                                <template v-if="canAddAudio">
                                                                    <template v-if="item?.audio">
                                                                        <audio class="mt-1" controls  style="max-width: 448px;width: 100%;">
                                                                            <source :src="item.audio" type="audio/mpeg">
                                                                            Your browser does not support the audio element.
                                                                        </audio>

                                                                    </template>

                                                                    <input class="form-control" type="file"
                                                                           :name="'audio-questions['+key+']'"
                                                                           accept="audio/*"
                                                                    >

                                                                </template>


                                                                <template v-if="canAddAnswerVariants || canAddImage">

                                                                    <div class="card">

                                                                        <div class="card-title df"
                                                                             v-for="(variant, index) in item.answerVariants">

                                                                            <div class="df-fdc w-100">

                                                                                <input class="form-control "
                                                                                       v-model="variant.title"
                                                                                       placeholder="Введите возможные варианты ответов">

                                                                                <textarea class="form-control"
                                                                                          v-model="variant.result"
                                                                                          placeholder="Введите правильный результат"></textarea>

                                                                            </div>

                                                                            <button type="button"
                                                                                    class="btn btn-outline-danger"
                                                                                    @click="()=>removeAnswerVariant(key,index )"
                                                                            >
                                                                                Убрать  <br> вариант
                                                                            </button>

                                                                        </div>
                                                                        <button type="button"
                                                                               v-if="canShowAddBtn(key)"
                                                                                class="btn btn-primary"
                                                                                @click="()=>addAnswerVariant(key)"
                                                                        >
                                                                            Добавить вариант
                                                                        </button>

                                                                    </div>

                                                                </template>
                                                            </div>

                                                        </div>

                                                        <button v-if="key > 0" class="btn btn btn-outline-danger" type="button"
                                                                @click="()=>removeQuestion(key)">Убрать <br> вопрос
                                                        </button>
                                                    </div>

                                                </div>

                                                <div class="">
                                                    <button type="button" @click="addQuestion"
                                                            class="btn btn-primary add-answer-variants">Добавить вопрос
                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                        <div  class="col-md-6 mb-4">
                                            <h5 class="f-18 font-weight-bold d-inline-block mb-3">Варианты результов теста и их описание</h5>
                                            <input type="hidden" ref="resultVariantsEl" name="result_variants">
                                            <div  id="results-wrap" >

                                                <div class="results-list ">
                                                    <div v-for="(item, key) in result_variants"
                                                         class="mb-2 results-item-wrap w-100 df">
                                                        <div class=" results-item w-100 ">

                                                            <h5 class="f-16"></h5>

                                                            <div class="">
                                                                <input class="form-control" type="text" v-model="item.variant"
                                                                       placeholder="Введите вариант">

                                                                <input class="form-control" type="text" v-model="item.description"
                                                                       placeholder="Введите описание">

                                                                <textarea class="form-control"
                                                                          v-model="item.recommendations"
                                                                          placeholder="Введите рекомендации"></textarea>


                                                                    <button type="button"
                                                                            class="btn btn-outline-danger"
                                                                            @click="()=>removeResult(key )"
                                                                    >
                                                                        Убрать
                                                                    </button>


                                                            </div>

                                                        </div>

                                                    </div>
                                                    <button  class="btn btn btn-success" type="button"
                                                             @click="addResult">Добавить вариант результата
                                                    </button>
                                                </div>


                                            </div>


                                        </div>
                                    </div>

                                </div>

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
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>

    const { createApp } = Vue;
    const wrapEl = document.getElementById('questions-wrap');

    const app = createApp({

            computed: {

                questionInput () {
                    return this.$refs['questionsEl'];
                },
                resultVariantsInput () {
                    return this.$refs['resultVariantsEl'];
                },
                canAddTest(){
                    return  this.answerInputType.trim() !== 'empty' && this.answerInputType.trim() != ''
                },

                canShowAddBtn(self){
                    return (key)=>{
                        if(key > 0){
                            return self.answerInputType.trim().includes('image')
                        }
                       return  true
                    }

                },

                canAddImage () {
                    return this.answerInputType.includes('image');
                },
                canAddAudio () {
                    return this.answerInputType.includes('audio');
                },
                canAddAnswerVariants () {
                    return this.answerInputType.includes('radio') || this.answerInputType.includes('select');
                },
            },
            watch: {
                questions: {
                    handler: function (val, oldVal) {
                        if (this.questions.length > 0) {

                            let  result = this.questions.filter(item => item.title !== '');

                            this.questionInput.value = JSON.stringify(result);
                        }
                    },
                    deep: true,

                },


                result_variants: {
                    handler: function (val, oldVal) {
                        if (this.result_variants.length > 0) {

                            let  result = this.result_variants.filter(item => item.title !== '');

                            this.resultVariantsInput.value = JSON.stringify(result);
                        }
                    },
                    deep: true,

                },


            },
            data () {
                return {

                    answerInputType: '',

                    questions: [
                        // { title: ' ?', answerVariants: [] },
                    ],
                    result_variants: [
                        // {variant:'', description:'', recommendations: ''}
                    ],
                };
            },

            methods: {

                addQuestion () {
                    this.questions.push({ title: '', answerVariants: [] }); //{ variant: '', description: '', title: '' }
                },
                removeQuestion(key) {
                    this.questions.splice(key, 1);
                },
                addResult () {
                    this.result_variants.push({variant:'', description:'', recommendations: ''});
                },
                removeResult(key) {
                    this.result_variants.splice(key, 1);
                },

                addAnswerVariant(key){
                    this.questions[key].answerVariants.push({title:''})
                },
                removeAnswerVariant(key, index){
                    this.questions[key].answerVariants.splice(index, 1)
                }
            },

            mounted () {

                setTimeout(() => {
                    this.answerInputType = '{!! $model->answer_input_type->value ?? 'empty' !!}';
                    this.questions = JSON.parse('{!!$model->questions ?? '[]'!!}');
                    this.result_variants = JSON.parse('{!!$model->result_variants ?? '[]'!!}');

                }, 0);
            },

        },

    );

    app.mount('#questions-app');
</script>

