  <!-- service panel -->
<div id="services" class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
    <h5 class="multisteps-form__title guaranteed">Are you interested in
        our Guaranteed Admissions Service?</h5>
    <h5 class="multisteps-form__title priority d-none">Are you interested in our
        Priority Application Service? (Recommended)</h5>

    <div class="multisteps-form__content">

        <form action="" class="optional-service-price" id="optional-service">
            <section class="" id="optional-services">
                {{-- <div class="custom-control custom-radio">
                    <input type="radio" data-orig-app-fee="285" data-app-fee="285" data-srv-fee="0" data-opt-srv-fee="990" data-total="990" data-name="application_premium" id="application_premium" name="optional_service" class="custom-control-input" value="12" checked="">
                    <label class="custom-control-label" for="application_premium"><strong>
                    Guaranteed Application Service - $990
                    </strong></label>
                    <small>
                        <p style="text-align:initial">
                            ✓&nbsp;<b>Personal Counsellor</b> - Work closely with our professional counsellor through chat and call to choose the right universities and programs and coordinate your application end-to-end. <br>
                            ✓&nbsp;<b>Fast-track Your Application</b> - save time and apply to up to three programs to process your application with priority processing.<br>
                            ✓&nbsp;<b>Refund Guarantee</b> - lock in your chances of being accepted to a top university with a partial refund guarantee. (terms and conditions apply). <br>
                            ✓&nbsp;<b>Application Fee Included</b> - This includes the $<span class="app-fee">285</span> USD application fee which is paid to 3 universities.<br>
                            Full info and book a free call <a href="https://vip.china-admissions.com" target="_blank"> here</a>
                        </p>
                    </small>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" data-orig-app-fee="285" data-app-fee="285" data-srv-fee="0" data-opt-srv-fee="135" data-total="420" data-name="application_priority" id="application_priority" name="optional_service" class="custom-control-input" value="11">
                    <label class="custom-control-label" for="application_priority"><strong>
                    Priority Application Service - $420
                    </strong></label>
                    <small>
                    <p>
                            ✓&nbsp;<b>Fast-Track Your Application</b> through the admissions process within 24 hours (48 hours on weekends)<br>
                            ✓&nbsp;<b>Application Fee Included</b> This includes the $<span class="app-fee">285</span> USD application fee to the university.<br>

                        </p>
                    </small>
                </div> --}}
                <div class="custom-control custom-radio">
                    <input checked type="radio" data-orig-app-fee="285" data-app-fee="285" data-srv-fee="0" data-opt-srv-fee="0" data-total="285" data-name="none" id="none" name="optional_service" class="custom-control-input" value="15">
                    <label class="custom-control-label" for="none"><strong>
                    No, thanks (Basic Service) - {{ format_price($application->application_fee) }}
                    </strong></label>
                    <small>
                    <p style="text-align:initial">
                            ✓&nbsp;<b>Price Match</b> - <span class="app-fee">{{ format_price($application->application_fee) }}</span> is the university application fee that will be paid to the university. It covers the cost of processing applications, preparing your visa, and sending the admissions package to you in your home country. If this is lower to apply directly we will refund the difference.<br>
                            ✓&nbsp;<b>Free Email Support Is Available</b> - by our award winning international and Chinese team with average reply speed of 6 hours 23 minutes. <br>
                            ✓&nbsp;<b>Free Document Review &amp; Assistance</b> - before you have submitted your final application.<br>
                        </p>
                    </small>
                </div>
            </section>


        </form>
        <div id="no-optional-services" class="d-none">
            There are no available optional services for the programs in your
            application.
            You can move to the next step!
        </div>



        <div class="row">
            <div class="button-row d-flex mt-4 col-12">
                <button class="btn btn-secondary js-btn-prev" type="button" title="Prev">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Previous</button>
                <button class="btn btn-danger ml-auto service btn-upload-doc" type="button" title="Next">
                    <span class="title">Next</span>
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</div>
