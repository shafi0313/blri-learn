<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.event-calender') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.event-calender')])</p>
        <div>
            <input type="checkbox" value="event-calender-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageEvnCal" name="permissions[]" id="ManageEvnCal"
                @if($permissions['event-calender-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageEvnCal">
                @lang('role.yes-allow', ['attribute'=> __('academic.event-calender')])
            </label>
        </div>
        <div style="@if($permissions['event-calender-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageEvnCal">
            <div>
                <input type="checkbox" value="event-calender-add" class="flat-red " name="permissions[]" id="createEvnCal"
                    @if($permissions['event-calender-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createEvnCal">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="event-calender-edit" class="flat-red " name="permissions[]" id="editEvnCal"
                    @if($permissions['event-calender-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editEvnCal">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="event-calender-delete" class="flat-red " name="permissions[]" id="deleteEvnCal"
                    @if($permissions['event-calender-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteEvnCal">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
