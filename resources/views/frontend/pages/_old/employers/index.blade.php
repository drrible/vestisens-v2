@extends('frontend._layouts.app')

@section('content')

    <div class="section table">
        <div class="container">

            <h3 class="text-center mb-5">Cотрудники</h3>

            <div class="table-responsive">

                <table class="table table-striped custom-table">
                    <thead>
                    <tr>


                        <th scope="col" >ФИО</th>
                        <th scope="col" >Еmail</th>
                        <th scope="col" >Должность</th>

                        <th scope="col" >Дата приема на работу</th>


                    </tr>
                    </thead>
                    <tbody>

{{--                    @dd($users->pluck('id'))--}}
                    @foreach($users as $item)
                    <tr scope="row">



                        <td>
                            <a href="{{route('employers')}}/{{$item->id}}" class="name">{{$item->fullname}}</a>

                        </td>
                        <td class="pl-0">
                            {{$item->email}}
                        </td>
                        <td>
                            {{!is_null($item->position) ? $item->position->title : '' }}
                        </td>
                        <td>{{$item->getFrontDate($item->employment_date)}}</td>




                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>

@endsection
