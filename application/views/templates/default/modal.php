<!-- dialog modal - error message -->
<div id='error' class="wrong">
    <div id="close" class="close_error" title='close'> X </div>
</div>

<div id='page_loading_notification' class="notification notification_page_loading" style="display: block;">
    Loading, please wait...
</div>

<div id='failure_notification' class="notification notification_error">
</div>

<div id='success_notification' class="notification notification_success">
</div>

<div id='general_notification' class="notification notification_general"> 
</div>

<!-- modal - semi-error message -->
<div id="semi_error_modal" class="modal fade in internshala-modal-messages" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="table-cell">
                    <img src="/static/images/common/error.png">
                </div>
                <div class="table-cell">
                    <p class="text-message"></p>
                </div>
                <hr>
                <a class="btn btn-default close_action" data-dismiss= "modal">Close</a>
            </div>
        </div>
    </div>
</div>

<!-- modal - error message -->
<div id="error_modal" class="modal fade in internshala-modal-messages" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="table-cell">
                    <img src="/static/images/common/error.png">
                </div>
                <div class="table-cell">
                    <p class="text-message"></p>
                </div>
                <hr>
                <a href="" class="btn btn-default" data-dismiss= "modal">Close</a>
            </div>
        </div>
    </div>
</div>

<!-- modal - semi-success message -->
<div id="semi_success_modal" class="modal fade in internshala-modal-messages" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="table-cell">
                    <img src="/static/images/common/success.png">
                </div>
                <div class="table-cell">
                    <p class="text-message"></p>
                </div>
                <hr>
                <a class="btn btn-default close_action" data-dismiss= "modal">Close</a>
            </div>
        </div>
    </div>
</div>

<!-- modal - success message -->
<div id="success_modal" class="modal fade in internshala-modal-messages" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="table-cell">
                    <img src="/static/images/common/success.png">
                </div>
                <div class="table-cell">
                    <p class="text-message"></p>
                </div>
                <hr>
                <a href="" class="btn btn-default" data-dismiss= "modal">Close</a>
            </div>
        </div>
    </div>
</div>

<!-- modal - alert message -->
<div id="alert_modal" class="modal fade in internshala-modal-messages" style="display: none">
    <div id="alert_modal_backdrop" class="modal-backdrop fade in" style="height: 100%; display: none;"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="table-cell">
                    <img src="/static/images/common/warning.png">
                </div>
                <div class="table-cell">
                    <p class="text-message"></p>
                </div>
                <hr>
                <a class="btn btn-default close_action" data-dismiss= "modal">OK</a>
            </div>
        </div>
    </div>
</div>

<div class="loading_image">
</div>

<noscript>
    <div class="notification notification_js_disabled" style="display: block;">
        Oops, your browser does not support Javascript. Please use Internshala in another browser.
    </div>
</noscript>

<div class='toast' style='display:none'>
    <div class="toast-content"></div>
</div>