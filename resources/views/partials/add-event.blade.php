<form id="add-event-form">
    <fieldset>
        <div class="form-group">
            <label>Select Event Icon</label>
            <div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
                <label class="btn btn-default active">
                    <input type="radio" class="iconselect" name="iconselect" id="icon-1" value="fa-info" checked="">
                    <i class="fa fa-info text-muted"></i> </label>
                <label class="btn btn-default">
                    <input type="radio" class="iconselect" name="iconselect" id="icon-2" value="fa-warning">
                    <i class="fa fa-warning text-muted"></i> </label>
                <label class="btn btn-default">
                    <input type="radio" class="iconselect" name="iconselect" id="icon-3" value="fa-check">
                    <i class="fa fa-check text-muted"></i> </label>
                <label class="btn btn-default">
                    <input type="radio" class="iconselect" name="iconselect" id="icon-4" value="fa-user">
                    <i class="fa fa-user text-muted"></i> </label>
                <label class="btn btn-default">
                    <input type="radio" class="iconselect" name="iconselect" id="icon-5" value="fa-lock">
                    <i class="fa fa-lock text-muted"></i> </label>
                <label class="btn btn-default">
                    <input type="radio" class="iconselect" name="iconselect" id="icon-6" value="fa-clock-o">
                    <i class="fa fa-clock-o text-muted"></i> </label>
            </div>
        </div>

        <div class="form-group">
            <label>Event Title</label>
            <input class="form-control" id="title" name="title" maxlength="40" type="text" placeholder="Event Title">
        </div>
        <div class="form-group">
            <label>Event Description</label>
            <textarea class="form-control" placeholder="Please be brief" rows="3" maxlength="40" id="description"></textarea>
            <p class="note">Maxlength is set to 40 characters</p>
        </div>

        <div class="form-group">
            <label>Event Date</label>
            <input class="form-control" id="date" name="date" type="date">
        </div>

        <div class="form-group">
            <label>Select Event Color</label>
            <div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                <label class="btn bg-color-brown active">
                    <input type="radio" class="color" name="priority" id="option1" value="brown" checked="">
                    <i class="fa fa-check txt-color-white"></i> </label>
                <label class="btn bg-color-blue">
                    <input type="radio" class="color" name="priority" id="option2" value="blue">
                    <i class="fa fa-check txt-color-white"></i> </label>
                <label class="btn bg-color-orange">
                    <input type="radio" class="color" name="priority" id="option3" value="orange">
                    <i class="fa fa-check txt-color-white"></i> </label>
                <label class="btn bg-color-light-green">
                    <input type="radio" class="color" name="priority" id="option4" value="light-green">
                    <i class="fa fa-check txt-color-white"></i> </label>
                <label class="btn bg-color-light-blue">
                    <input type="radio" class="color" name="priority" id="option5" value="light-blue">
                    <i class="fa fa-check txt-color-white"></i> </label>
                <label class="btn bg-color-red">
                    <input type="radio" class="color" name="priority" id="option6" value="red">
                    <i class="fa fa-check txt-color-white"></i> </label>
            </div>
        </div>

    </fieldset>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-default" id="submit" type="submit">
                    Add Event
                </button>
            </div>
        </div>
    </div>
</form>