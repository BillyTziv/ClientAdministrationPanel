@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading" >
                    <div class="section_subheading">
                        <h1><i class="fa fa-cogs" aria-hidden="true"></i> New Service</h1>
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
                    <div class="insertSection">
                        <form class="client-form" action="{{URL::to('/insertNewService')}}" method="POST" autocomplete="on">
                            {{csrf_field()}}
                            <div style="width: 600px; height: 70px; margin-left: auto; margin-right: auto;" > </br>
                                <table>
                                    <tr>
                                        <td>
                                            <h3 style="padding-right: 25px; padding-top: 10px; text-align: right; " id="firstSubTitle">Select the service client </h3>
                                        </td>
                                        <td>
                                            <select style="width: 200px; height: 32px; font-family: Arial; font-size: 14px; border-radius: 3px;"  name="clientSelected">
                                                <?php
                                                    $clientsDataset = DB::select('select * from clients');
                                                
                                                    foreach ($clientsDataset as $client) {
                                                        echo "<option value=\"" . $client->clientId . "\">" . $client->clientFirstname . " " . $client->clientSurname . "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3 style="padding-right: 25px; padding-top: 10px; text-align: right;" id="firstSubTitle">Select the associated company </h3>
                                        </td>
                                        <td>
                                            <select style="width: 200px; height: 32px; font-family: Arial; font-size: 14px; border-radius: 3px;" name="companySelected">
                                                <?php
                                                    $companiesDataset = DB::select('select * from companies');
                                                
                                                    foreach ($companiesDataset as $company) {
                                                        echo "<option value=\"" . $company->id . "\">" . $company->name . "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div> </br></br>

                                    
                            <!-- <h3 class="subtitle fancy"><span>Στοιχεία Υπηρεσίας</span> </h3>-->
                            <table class="form-section" style="width: 100%;">
                                <tr>
                                    <td>
                                        <div class="inputCompany">
                                            <input type="text" name="serviceName" placeholder="Type the service name..." required>
                                            <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Name:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputCompany">
                                            <input type="text" name="serviceType" placeholder="Type the service type..." required>
                                            <i class="fa fa-id-badge fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Type:</span></i>
                                        </div>
                                    </td>
                                
                                    <td>     
                                        <div class="inputServiceMoney" id="ssection">
                                            <input type="text" name="maintenanceCost" placeholder="Subscription..." required>
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceFieldMoney">Subscription:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="inputServiceMoney">
                                            <input type="text" name="totalCost" placeholder="Type the total cost ..." required>
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceFieldMoney">Total:</span></i>
                                        </div></td>
                                    <td>
                                        <div class="inputServiceMoney" id="bsection">
                                            <input type="text" name="balance" placeholder="Type the balance..." required>
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceFieldMoney">Balance:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputServiceMoney" id="dsection">
                                            <input type="text" name="deposit" placeholder="Type the deposit..." required>
                                            <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"><span class="serviceFieldMoney">Deposit:</span></i>
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
                                </table></br>
                                <input type="hidden" name="token" value="">
                                </div>  
                        </form>
                    </div> <!-- End of insert section -->
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-12 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection