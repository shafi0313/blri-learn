<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.syllabus') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.syllabus')])</p>
        <div>
            <input type="checkbox" value="syllabus-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageSlybus" name="permissions[]" id="ManageSlybus"
                @if($permissions['syllabus-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageSlybus">
                @lang('role.yes-allow', ['attribute'=> __('academic.syllabus')])
            </label>
        </div>
        <div style="@if($permissions['syllabus-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageSlybus">
            <div>
                <input type="checkbox" value="syllabus-add" class="flat-red " name="permissions[]" id="createSlybus"
                    @if($permissions['syllabus-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createSlybus">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="syllabus-edit" class="flat-red " name="permissions[]" id="editSlybus"
                    @if($permissions['syllabus-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editSlybus">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="syllabus-delete" class="flat-red " name="permissions[]" id="deleteSlybus"
                    @if($permissions['syllabus-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteSlybus">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
