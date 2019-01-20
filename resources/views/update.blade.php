@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row"  >
        <div  style="float: none;margin: 0 auto; width: 450px;">
            <div class="col-md-12">
                <div class="section-area">
                    <!-- Section heading with the bottom line divider -->
                    <div class="section_subheading">
                        <h1><i class="fa fa-user" aria-hidden="true"></i>Profile Update</h1>
                        <div class="section-heading-divider"></div>
                    </div>
                    <div class="insertSection">
                    <div class="section-heading">
                        <!-- Check the session status -->
                        <div class="section-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        

                        <form class="client-form" action="{{URL::to('/updateClient')}}" method="POST">
                            {{csrf_field()}}
                            <img style="display: block;  margin-left: auto; margin-right: auto;" width="150px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/768px-Circle-icons-profile.svg.png">
                            </br>

                            <table class="form-section" style="width:100%;">
                                <tr>
                                    <input style="margin: auto;" type="file" name="fileToUpload" id="fileToUpload"></br>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientId" value="{{$clientId}}">
                                        <i class="fa fa-id-card fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">ID:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientFirstname" value="{{$clientFirstname}}" placeholder="Type the firstname...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">FirstName:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientSurname" value="{{$clientSurname}}" placeholder="Type the lastname...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">LastName:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientEmail" value="{{$clientEmail}}" placeholder="Type the email...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Email:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientMobile" value="{{$clientMobile}}" placeholder="Type the mobile number...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Mobile:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="isActive" value="{{$is_active}}" placeholder="Active or Inactive...">
                                        <i class="fa fa-circle fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Active:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="renewText">
                                            1 - Active Client, 0 - Inactive Client
                                        </span>
                                    </td>
                                </tr>
                                <!--<tr>
                                  
                                    <div class="onoffswitch">
                                        <?php
                                            //if($is_active == 1) {
                                            //    echo "<input type=\"checkbox\" value=\"1\"  name=\"isActive\" class=\"onoffswitch-checkbox\" id=\"myonoffswitch\" checked>";
                                           // }else {
                                           //     echo "<input type=\"checkbox\" value=\"0\"  name=\"isActive\" class=\"onoffswitch-checkbox\" id=\"myonoffswitch\">";
                                          //  }
                                        ?>
                                        <label class="onoffswitch-label" for="myonoffswitch">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                  
                                </tr>-->
                            </table>
    
                     
                            <input type="hidden" name="selRowId" value="{{$selRow}}"></br>

                            <div class="insertSection"></br>
                            <table class="form-section">
                                <tr>
                                    <td>
                                        <input type="reset" id="resetFields" value="Reset" >
                                    </td>
                                    <td>
                                        <button type="submit" class="submitButton" name="button">Create</button>
                                    </td>
                                </tr>
                            </table>         
                            </br>
                            
                            
                            <input type="hidden" name="token" value="">
                            
                        </div>
                        </form>
                    </div> <!-- End of section-body -->
                </div> <!-- End of section-area -->
                                        </div>
            </div>
        </div> <!-- End of col-md-6 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection