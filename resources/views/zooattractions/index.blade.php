@extends('layouts.app')

@section('content')
<div class="breadcrumbs d-flex align-items-center" style="margin-top: -5%"></div>

<main id="main">

  @include('inc.messages')
       
    <!-- ======= Our products Section ======= -->
    <section id="services-list" class="services-list ">
     <div class="container-fluid" data-aos="fade-up">
   
       <div class="section-header">
         <h2 class="title">Manage Zoo Attractions</h2>
   
       </div>
       
       <div class="row  d-block box-container" style="margin: 0 auto" >
   
        <div class="col-lg-12">
            <div class="row">
  
              <!-- Advertisement -->
              <div class="col-12">
                <div class="card top-selling overflow-auto">
  
  
                  <div class="card-body pb-0">
                   
                    <div>
                      <button type="button" class="btn btn-primary mb-3"><a href="./zooattractions/addattractions" style="text-decoration:none; color:white; margin-bottom:2%">ADD NEW ATTRACTION</a></button>
                  </div>
                  
                  <table class="table table-hover border">
                    <thead class="bg-dark text-light fw-bold border">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Adult Price</th>
                        <th scope="col">Senior Price</th>
                        <th scope="col">Child Price</th>
                        <th scope="col">Per Day</th>
                        <th scope="col">Revenue</th>
{{--                         <th scope="col">SupervisorID</th> --}}
                        <th scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($attractions as $attraction)
                      <tr>
                        <td><a href="#" class="text-primary fw-bold">{{ $attraction->Name }}</a></td>
                        <td>{{ $attraction->Type }}</td>
                        <td>{{ $attraction->AdultPrice }}</td>
                        <td>{{ $attraction->SeniorPrice }}</td>
                        <td>{{ $attraction->ChildPrice }}</td>
                        <td>{{ $attraction->PerDay }}</td>
                        <td>{{ (($attraction->AdultPrice) + ($attraction->SeniorPrice)+($attraction->SeniorPrice)+($attraction->ChildPrice))*($attraction->PerDay) }}</td>
                        {{-- <td>{{ $employee->SupervisorID }}</td> --}}
                        <td><a href="./zooattractions/{{$attraction->ID}}/editattraction" class="btn btn-success">Edit</a></td>
  
                        <td>{!!Form::open(['action'=> ['App\Http\Controllers\ActivityController@destroyattraction',$attraction->ID], 'method' =>'POST', 'class' =>'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td> 
  
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                
                  </div>
  
                </div>
            </div>
      
            </div>
       </div>
      </section>
   
     </main><!-- End #main -->
@endsection