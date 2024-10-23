<div class="headerTop">
    <div class="dropMenuWrap flexBetween">
        <div class="pageNameWrap">
            <h5 class="secTitle">Gurukul Registration</h5>
        </div>
        <div class="rightWrap">
            <div class="location-info flex flex-col justify-center items-end mr-10px">
                <form action="{{ route('locale.change') }}" method="POST" class="d-inline">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" class="form-select">
                        <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : '' }}>English</option>
                        <option value="hi"{{ app()->getLocale() == 'hi' ? ' selected' : '' }}>Hindi</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>