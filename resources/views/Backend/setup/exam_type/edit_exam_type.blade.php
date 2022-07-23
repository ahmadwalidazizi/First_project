@extends('admin.admin_master')
@section('admin')

				<div class="container app-content">
                    <div class="">
						<div class="page-header">
                            <!-- PAGE-HEADER -->
                            <div>
                                <h1 class="page-title">Setup/Subjects Management</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('exam.type.view')}}">Exams Type List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Exam type </li>
                                </ol>
                            </div>
                        </div>
                        <form action="{{route('exam.type.update', $editData->id)}}" method="post" class="form-group">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-12">
                                    <div class="card img-card box-primary-shadow">
                                        <div class="card-body">
                                            <!--Start row-->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label> Exam type Name:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div><!-- input-group-prepend -->
                                                        <input type="text" name="name" id="examtype" class="form-control" value="{{$editData->name}}">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                    </div>
                                                </div>                                               
                                            </div>
                                            <!--End row-->
                                        </div>
                                    </div>
                                    <button class="btn btn-info">Update</button> 
                                <!-- COL END -->
                            </div> 
                        </form>
                    </div>
                </div>


@endsection