@extends('layouts.app')

@section('content')
<div class="breadcrumbs d-flex align-items-center" style="margin-top: -5%"></div>

<main id="main">

  @include('inc.messages')
       
    <!-- ======= Our products Section ======= -->
    <section id="services-list" class="services-list ">
     <div class="container-fluid" data-aos="fade-up">
   
       <div class="section-header">
         <h2 class="title">Attendance</h2>
   
       </div>
       
       <div class="row  d-block box-container" style="margin: 0 auto" >
   
        <div class="col-lg-12">
            <div class="row">
  
              <!-- Advertisement -->
              <div class="col-12">
                <div class="card top-selling overflow-auto">
  
  
                  <div class="card-body pb-0">
                   
                    <div>
                      <button type="button" class="btn btn-primary mb-3"><a href="./attendance/addattendance" style="text-decoration:none; color:white; margin-bottom:2%">ADD NEW ATTENDANCE</a></button>
                  </div>
                  
                  <table class="table table-hover border">
                    <thead class="bg-dark text-light fw-bold border">
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Revenue</th>
                        <th scope="col">TicketSold</th>
                        <th scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($attendance as $wage)
                      <tr>
                        <td><a href="#" class="text-primary fw-bold">{{ $wage->Date }}</a></td>
                        <td>{{ $wage->Revenue }}</td>
                        <td>{{ $wage->TicketsSold }}</td>
                        <td><a href="./attendance/{{$wage->ID}}/editattendance" class="btn btn-success">Edit</a></td>
  
                        <td>{!!Form::open(['action'=> ['App\Http\Controllers\ActivityController@destroyattendance',$wage->ID], 'method' =>'POST', 'class' =>'pull-right'])!!}
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