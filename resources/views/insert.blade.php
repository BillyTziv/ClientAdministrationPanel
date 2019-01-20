@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading" >
                    <div class="section_subheading">
                        <h1><i class="fa fa-user" aria-hidden="true"></i> New Client</h1>
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

                    <form class="client-form" action="{{URL::to('/insert')}}" method="POST" autocomplete="on">
                        {{csrf_field()}}

                        
                        <div class="insertSection">
                            <h3 class="subtitle fancy"><span>Personal Information</span> </h3>
                            <table class="form-section">
                                <tr>
                                    <td>
                                        <div class="inputID">
                                            <?php
                                                // Get the latest clietn ID from the database and/or create a new one
                                                $latestID = DB::select('select clientId from clients order by clientId DESC');

                                                // Check if this is the first record. If it is then set id to 50 (no reason).
                                                if ($latestID == null) {
                                                    $newId = 50;
                                                }else {
                                                    $newId = (int)$latestID[0]->clientId + 1;
                                                }
                                            ?>
                                            <input type="number" name="clientId" value="<?php echo $newId; ?>" required>
                                            <i class="fa fa-id-card fa-lg fa-fw" aria-hidden="true"><span class="clientFieldID">ID:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputName">
                                            <input type="text" name="clientFirstname" placeholder="Type the client firstname..." required>
                                            <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldName">FirstName:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputName">
                                            <input type="text" name="clientSurname" placeholder="Type the client lastname..." required>
                                            <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldName">LastName:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="inputEmail">
                                            <input type="email" name="clientEmail" placeholder="Type the client email..." required>
                                            <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldEmail">Email:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputMobile">
                                            <input type="text" name="clientMobile" placeholder="Type the client mobile number..." required>
                                            <i class="fa fa-mobile fa-2x fa-fw"  aria-hidden="true"><span class="clientFieldMobile">Mobile:</span></i>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="insertSection">
                            <h3 class="subtitle fancy"><span>Company Information</span> </h3>
                            <table class="form-section">
                                <tr>
                                    <td>
                                        <div class="inputCompany">
                                            <input type="text" name="companyName" placeholder="Type the company name..." required>
                                            <i class="fa fa-id-badge fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Name:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputCompany">
                                            <input type="text" name="companyType" placeholder="Type the company type..." required>
                                            <i class="fa fa-building-o fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Type:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputCompany">
                                            <input type="text" name="clientPhone" placeholder="Type the company phone..." required>
                                            <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Phone:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="inputCompany" id="inputCompanyEmail">
                                            <input type="email" name="companyEmail" placeholder="Type the company email..." required>
                                            <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Email:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputCompany" id="inputCompanyAddress" >
                                            <input type="text" name="clientAdrress" placeholder="Type the company address..." required>
                                            <i class="fa fa-map-marker fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Address:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputCompany" id="inputCompanyWebsite">
                                            <input type="text" name="websiteURL" placeholder="Type the company website..." required>
                                            <i class="fa fa-globe fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Website:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="inputCompany" id="inputCompanyComments">
                                            <!-- <input type="textarea" name="companyComments" placeholder="Type any comments about the company..." required>-->
                                            <textarea rows="2" cols="50" name="companyComments" placeholder="Type any comments about the company..." required> </textarea>
                                            <i class="fa fa-comments-o fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Comments:</span></i>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="insertSection">             
                            <h3 class="subtitle fancy"><span>Service Information</span> </h3>
                            <table class="form-section">
                                <tr>
                                    <td>
                                        <div class="inputCompany">
                                            <input type="text" name="serviceName" placeholder="Type a service name..." required>
                                            <i class="fa fa-id-badge fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Name:</span></i>
                                        </div>
                                    </td>
                                    <td>   
                                        <div class="serviceTypeBox">
                                            <!--<input type="text" name="services" placeholder="Πληκτρολόγησε τον τύπο της υπηρεσίας..." required>
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Type:</span></i>-->
                                            <i class="fa fa-id-badge fa-lg fa-fw" aria-hidden="true"><span class="serviceTypeLabel">Type:</span></i>
                                            <select id="serviceType" name="services" required>
                                                <option value="null">-</option>
                                                <option value="Κατασκευή wordpress ιστοσελίδας">Κατασκευή wordpress ιστοσελίδας</option>
                                                <option value="Κατασκευή custom Ιστοσελίδας">Κατασκευή custom Ιστοσελίδας</option>
                                                <option value="Συντήρηση ιστοσελίδας">Συντήρηση ιστοσελίδας (hosting)</option>
                                                <option value="Εκτυπωτικά">Εκτυπωτικά</option>
                                            </select>
                                          

                                        </div>
                                    </td>
                                    <td>   
                                        <div class="inputServiceMoney">
                                            <input type="text" name="totalPrice" placeholder="Type the service total cost..." required>
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceFieldMoney">Total:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>   
                                        <div class="inputServiceMoney" id="depositSection">
                                            <input type="text" name="deposit" placeholder="Type the service deposit..." required>
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceFieldMoney">Deposit:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputServiceMoney" id="balanceSection">
                                            <input type="text" name="balance" placeholder="Type the service balance..." required>
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceFieldMoney">Balance:</span></i>
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="inputServiceMoney" id="subscriptionSection">
                                            <input type="text" name="serverPrice" placeholder="Type the service subscription..." required>
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceFieldMoney">Subscription:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="inputCompany" id="inputCompanyComments">
                                            <!-- <input type="textarea" name="companyComments" placeholder="Type any comments about the company..." required>-->
                                            <textarea rows="2" cols="50" name="comments" placeholder="Type any comments about the service..." required> </textarea>
                                            <i class="fa fa-comments-o fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Comments:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="inputCompany"> </br>
                                            <span id="renewDate">Renew Date:</span>
                                            <input type="date" name="renewDate" min="<?php echo date('Y-m-d', strtotime('+1 years')); ?>" value="<?php echo date('Y-m-d', strtotime('+1 years')); ?>" required>
                                        </div>
                                    </td>
                                    <td colspan="2"></br>
                                        <span class="renewText">
                                            The first notification will be send 30 days before the end of the annual subscription.
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>

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
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection