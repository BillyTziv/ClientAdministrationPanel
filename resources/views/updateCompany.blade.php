@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row"  >
            <div class="col-md-12">
            
                <div class="section-area">
                    <!-- Section heading with the bottom line divider -->
                    <div class="section-heading" >
                    <div class="section_subheading">
                        <h1><i class="fa fa-building" aria-hidden="true"></i> Update Company</h1>
                        <div class="section-heading-divider"></div>
                    </div>
                </div>

                    <!-- Check the session status -->
                    <div class="section-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                       
                        <form class="client-form" action="{{URL::to('/updateCompanyData')}}" method="POST">
                        <div class="insertSection">
                            {{csrf_field()}}
                            <table class="form-section" style="width:100%;">

                                <tr>
                                    <td><div class="inputWithIcon">
                                        <input type="text" name="clientId" value="{{$client_id}}">
                                        <i class="fa fa-id-card fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Client:</span></i>
                                    </div></td>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="companyId" value="{{$id}}" placeholder="Πληκτρολογήσε το ID...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Company:</span></i>
                                    </div></td>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="name" value="{{$name}}" placeholder="Πληκτρολογήσε την επωνυμία...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Name:</span></i>
                                    </div></td>
                                    
                                </tr>
                              
                                <tr>
                                <td><div class="inputWithIcon">
                                        <input type="text" name="type" value="{{$type}}" placeholder="Πληκτρολογήσε τον τύπο της επιχείρησης...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Type:</span></i>
                                    </div></td>
                                <td> <div class="inputWithIcon">
                                        <input type="text" name="mobile" value="{{$phone}}" placeholder="Πληκτρολογήσε τον σταθερό τηλέφωνο...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Phone:</span></i>
                                    </div></td>
                                <td> <div class="inputWithIcon">
                                        <input type="text" name="mail" value="{{$email}}" placeholder="Πληκτρολογήσε το email...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Email:</span></i>
                                    </div></td>
                                    
                                </tr>
                               
                                <tr>
                                <td> <div class="inputWithIcon">
                                        <input type="text" name="address" value="{{$location}}" placeholder="Πληκτρολογήσε την διεύθυνση...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Address:</span></i>
                                    </div></td>
                                <td> <div class="inputWithIcon">
                                        <input type="text" name="web" value="{{$website}}" placeholder="Πληκτρολογήσε την ιστοσελίδα...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Website:</span></i>
                                    </div></td>
                                <td> </td>
                                   
                                </tr>
                                <tr>
                                   
                                   <td colspan="3">
                                   
                                       <div class="inputCompany" id="inputCompanyComments">
                                           <!-- <input type="textarea" name="companyComments" placeholder="Type any comments about the company..." required>-->
                                           <textarea rows="2" cols="50" name="comments" placeholder="Type any comments about the service..." required>{{$comments}}</textarea>
                                           <i class="fa fa-comments-o fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Comments:</span></i>
                                       </div>
                                   </td>
                               </tr>
                            </table>

                           
                            <input type="hidden" name="sel" value="{{$sel}}">
                        

</div>
                            <div class="insertSection"></br>
                            <table class="form-section">
                                <tr>
                                    <td>
                                        <input type="reset" id="resetFields" value="Reset" >
                                    </td>
                                    <td>
                                        <button type="submit" class="submitButton" name="button">Update</button>
                                    </td>
                                </tr>
                            </table>         
                            </br>
                            
                            
                            <input type="hidden" name="token" value="">
                            
                        </div>
                        </form>

                    </div> <!-- End of section-body -->
                </div> <!-- End of section-area -->
        </div> <!-- End of col-md-6 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection