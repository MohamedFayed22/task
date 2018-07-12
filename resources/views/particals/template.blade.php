

<!-- #region description -->


{{--<div class="form-feedback">--}}
    {{--<input name="_token" type="hidden">--}}
<div id="fb-description" class="fb-description-show">
    <div class="fb-logo">Feedback</div>
    <div class="fb-text">
        The feedback system allows you to share our criticisms and suggestions
    </div>
    <div class="fb-text" >type:</div>
    <select name="type" id="type">
        <option value="problem">{{ __('pages.problem') }}</option>
        <option value="problem-device">{{ __('pages.problem-pc') }}</option>
        <option value="add-job">{{ __('pages.add-job-report') }}</option>
        <option value="edit-job">{{ __('pages.edit-job-report') }}</option>
    </select>
    <div class="fb-text">description:</div>
    <textarea id="fb-note" class="description" ></textarea>
    <div class="fb-text">In the next step, you can specify your description with the provided tool</div>
    <a id="fb-description-next" class="fb-next-btn fb-btn-blue"> Next</a>
    <div class="fb-module-close"></div>
</div>

<!-- #endregion -->
 
<!-- #region highlighter -->

<div id="fb-highlighter" class="fb-highlighter">
    <div class="fb-logo"> Feedback</div>
    <div class="fb-text m-bottom-20">
        Please click on the gadgets below and then drag and drop on the screen.
    </div>
    <a id="fb-sethighlight" class="fb-sethighlight fb-active">
        <div class="ico"></div>
        <span>Characterization</span>
    </a>
    <label>Identify your desired locations with this tool</label>
    <a id="fb-setblackout" class="fb-setblackout">
        <div class="ico">
        </div><span>Hiding</span>
    </a>
    <label class="lower">Hide your personal information with this tool</label>
    <div class="fb-buttons">
        <a id="fb-highlighter-next" class="fb-next-btn fb-btn-blue"> Next</a>
        <a id="fb-highlighter-back" class="fb-back-btn fb-btn-gray">Back</a>
    </div><div class="fb-module-close"></div>
</div>

<!-- #endregion -->

<!-- #region overview -->
<div id="fb-overview" >
    <div class="fb-module-close"></div>
    <div class="fb-logo">Feedback </div>
    <div id="fb-overview-description">
        <div id="fb-overview-description-text">
            <h3 class="fb-title">description</h3>
            <textarea id="fb-overview-note"></textarea>
            <h3 class="fb-additional fb-title">more information</h3>
            <div id="fb-browser-info">
                <div class="according">Browser info</div>
                <div class="hide" id="fb-browser-infodetail">
                    <div class="text-right">
                        App code name:
                        <span id="browserInfo-appCodeName"></span>
                    </div>
                    <div class="text-right">
                        Program name:
                        <span id="browserInfo-appName"></span>
                    </div>
                    <div class="text-right">
                        Browser version:
                        <span id="browserInfo-appVersion"></span>
                    </div>
                    <div class="text-right">
                        cookie:
                        <span id="browserInfo-cookieEnabled"></span>
                    </div>
                    <div class="text-right">
                        Network status:
                        <span id="browserInfo-onLine"></span>
                    </div>
                    <div class="text-right">
                        Platform :
                        <span id="browserInfo-platform"></span>
                    </div>
                    <div class="text-right">
                        User operating system:
                        <span id="browserInfo-userAgent"></span>
                    </div>
                </div>
            </div>
            <div id="fb-page-info">
                <div class="according">Page info</div>
                <div class="hide text-left" id="fb-page-infodetail"></div>
            </div>
            <div id="fb-page-structure">
                <div class="according">Page structure</div>
                <div class="hide text-left" id="fb-html-infodetail">
                </div>
            </div>
        </div>
    </div>
    <div id="fb-overview-screenshot">
        <h3 class="fb-title">Page image</h3>
        <div id="loading-screenshot">
            <div id="loading-screenshot_1" class="loading-screenshot">
            </div>
        </div>
        <div id="fb-screenshot"  class=" fb-screenshot">
        </div>
    </div>
    <div class="fb-buttons">
        <button id="fb-submit" class="fb-submit-btn fb-btn-blue send"> Send</button>
        <a id="fb-overview-back" class="fb-back-btn fb-btn-gray">Back</a>
    </div>
</div>


{{--</div>--}}
<!-- #endregion -->

<!-- #region submitSuccess -->
<div id="fb-submit-success">
    <div class="fb-logo"> Feedback</div>
    <div class="fb-text">Thanks for posting your feedback.</div>
    <div class="fb-text">We can not respond to all the feedbacks one by one, but feedback can increase our work experience to upgrade the systems..</div>
    <button class="fb-close-btn fb-btn-blue">close</button>
    <div class="fb-module-close"></div>
</div>
<!-- #endregion -->

<!-- #region submitError -->
<div id="fb-submit-error">
    <div class="fb-logo"> Feedback</div>
    <div class="fb-text">Sorry, there was an error sending the feedback. Please try again</div>
    <button class="fb-close-btn fb-btn-blue">close</button>
    <div class="fb-module-close"></div>
</div>
<!-- #endregion -->

<!-- #region browserNotSupport -->

<div id="fb-browser-notsupport" class="fb-browser-notsupport-hide">
    <div class="fb-logo">Feedback</div>
    <div class="fb-text">Unfortunately, your browser does not support this feature. Please use a different browser</div>
    <button class="fb-close-btn fb-btn-blue">close</button>
    <div class="fb-module-close"></div>
</div>
<!-- #endregion -->








