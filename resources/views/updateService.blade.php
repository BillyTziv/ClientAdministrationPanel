@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row"  >
            <div class="col-md-12">
            
                <div class="section-area">
                    <!-- Section heading with the bottom line divider -->
                    <div class="section-area">
                    <!-- Section heading with the bottom line divider -->
                    <div class="section-heading" >
                    <div class="section_subheading">
                        <h1><i class="fa fa-building" aria-hidden="true"></i> Update Service</h1>
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
                        

                        <form class="client-form" action="{{URL::to('/updateServiceData')}}" method="POST">
                        <div class="insertSection">

                            {{csrf_field()}}

                            <table class="form-section" style="width:100%;">
                                <tr>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="client_id" value="{{$client_id}}">
                                        <i class="fa fa-id-card fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">ClientID:</span></i>
                                    </div></td>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="company_id" value="{{$company_id}}" placeholder="Πληκτρολογήσε το όνομα...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">CompanyID:</span></i>
                                    </div></td>
                                    <td>  <div class="inputWithIcon">
                                        <input type="text" name="name" value="{{$name}}" placeholder="Πληκτρολογήσε το επώνυμο...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Name:</span></i>
                                    </div></td>

                                   
                                </tr>
                                <tr>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="type" value="{{$type}}" placeholder="Πληκτρολογήσε το κυρίως e-mail...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Type:</span></i>
                                    </div></td>
                                    <td><div class="inputWithIcon">
                                        <input type="text" name="renew_date" value="{{$renew_date}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Date:</span></i>
                                    </div></td>
                                    <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="total_cost" value="{{$total_cost}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Total:</span></i>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="balance" value="{{$balance}}" placeholder="Πληκτρολογήσε το κυρίως e-mail...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Balance:</span></i>
                                    </div></td>
                                    <td><div class="inputWithIcon">
                                        <input type="text" name="deposit" value="{{$deposit}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Deposit:</span></i>
                                    </div></td>
                                    <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="maintenance_cost" value="{{$maintenance_cost}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Subscription:</span></i>
                                    </div>
                                    </td>
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
                                <td>
                                    <td>
                                        <div class="serviceTypeBox">
                                            <!--<input type="text" name="services" placeholder="Πληκτρολόγησε τον τύπο της υπηρεσίας..." required>
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Type:</span></i>-->
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceTypeLabel">IsPaid:</span></i>
                                            <select id="serviceType" name="services" required>
                                                <?php
                                                    if($is_paid == 1) {
                                                        echo "<option value=\"1\">Ναι</option>";
                                                        echo "<option value=\"0\">Οχι</option>";
                                                    }else {
                                                        echo "<option value=\"0\">Οχι</option>";
                                                        echo "<option value=\"1\">Ναι</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- <div class="inputWithIcon">
                                            <input type="text" name="serviceIsPaid" value="{{$is_paid}}">
                                            <i class="fa fa-circle fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Paid:</span></i>
                                        </div>-->
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="token" value="">
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