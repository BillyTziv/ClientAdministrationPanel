@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading" >
                    <div class="section_subheading">
                        <h1><i class="fa fa-building" aria-hidden="true"></i> New Company</h1>
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
                    
                    <form class="client-form" action="{{URL::to('/insertNewCompany')}}" method="POST" autocomplete="on">
                        {{csrf_field()}}
                    <div class="insertSection"></br>
                        <div style="width: 600px; height: 70px; margin-left: auto; margin-right: auto;" >
                            <table>
                                <tr>
                                    <td>
                                        <h3 style="padding-right: 25px; padding-top: 10px; " id="firstSubTitle">Select the company owner  </h3>
                                    </td>
                                    <td>
                                    <select style="width: 200px; height: 32px; font-family: Arial; font-size: 14px; border-radius: 3px;" name="clientSelected">
                                        <?php
                                            $clientsDataset = DB::select('select * from clients');
                                        
                                            foreach ($clientsDataset as $client) {
                                                echo "<option style=\"height: 32px; font-family: Arial; font-size: 14px;\"  value=\"" . $client->clientId . "\">" . $client->clientFirstname . " " . $client->clientSurname . "</option>";
                                            }
                                        ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                                   
                        <!-- <h3 class="subtitle fancy"><span>Στοιχεία Επιχείρησης</span> </h3>-->
                        <table class="form-section" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="inputCompany">
                                        <input type="text" name="companyName" placeholder="Πληκτρολόγησε την επωνυμία της νέας επιχείρησης..." required>
                                        <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Name:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputCompany">
                                        <input type="text" name="companyType" placeholder="Πληκτρολόγησε τον τύπο της νέας επιχείρησης..." required>
                                        <i class="fa fa-map-marker fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Type:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputCompany">
                                        <input type="text" name="companyPhone" placeholder="Πληκτρολόγησε το σταθερό τηλέφωνο..." required>
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Phone:</span></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inputCompany">
                                        <input type="text" name="companyEmail" placeholder="Πληκτρολόγησε το επαγγελματικό email (@domain)..." required>
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Email:</span></i>
                                    </div></td>
                                <td>
                                    <div class="inputCompany" id="inputCompanyAddress2">
                                        <input type="text" name="companyAddress" placeholder="Πληκτρολόγησε την διεύθυνση της επιχείρησης..." required>
                                        <i class="fa fa-globe fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Address:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputCompany" id="inputCompanyWebsite2">
                                        <input type="text" name="websiteURL" placeholder="Πληκτρολόγησε το url της ιστοσελίδας..." required>
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="companyFieldText">Website:</span></i>
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
                        </table>
                    </div> <!-- End of Insert Section -->
                    <div class="insertSection"></br>
                    <input type="hidden" name="token" value="">
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