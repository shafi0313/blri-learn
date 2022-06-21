<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.bio-attendance') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.bio-attendance')])</p>
        <div>
            <input type="checkbox" value="bio-attendance-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageBioAtndance" name="permissions[]" id="ManageBioAtndance"
                @if($permissions['bio-attendance-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageBioAtndance">
                @lang('role.yes-allow', ['attribute'=> __('academic.bio-attendance')])
            </label>
        </div>
        <div style="@if($permissions['bio-attendance-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageBioAtndance">
            <div>
                <input type="checkbox" value="bio-attendance-add" class="flat-red " name="permissions[]" id="createBioAtndance"
                    @if($permissions['bio-attendance-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createBioAtndance">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="bio-attendance-edit" class="flat-red " name="permissions[]" id="editBioAtndance"
                    @if($permissions['bio-attendance-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editBioAtndance">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="bio-attendance-delete" class="flat-red " name="permissions[]" id="deleteBioAtndance"
                    @if($permissions['bio-attendance-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteBioAtndance">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
