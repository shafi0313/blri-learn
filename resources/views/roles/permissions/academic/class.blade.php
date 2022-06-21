<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">@lang('academic.class') @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> __('academic.class')])</p>
        <div>
            <input type="checkbox" value="class-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageCls" name="permissions[]" id="ManageCls"
                @if($permissions['class-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageCls">
                @lang('role.yes-allow', ['attribute'=> __('academic.class')])
            </label>
        </div>
        <div style="@if($permissions['class-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageCls">
            <div>
                <input type="checkbox" value="class-add" class="flat-red " name="permissions[]" id="createCls"
                    @if($permissions['class-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createCls">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="class-edit" class="flat-red " name="permissions[]" id="editCls"
                    @if($permissions['class-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editCls">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="class-delete" class="flat-red " name="permissions[]" id="deleteCls"
                    @if($permissions['class-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteCls">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>
