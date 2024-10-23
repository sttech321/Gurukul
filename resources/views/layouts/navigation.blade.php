<div class="headerTop">
    <div class="dropMenuWrap flexBetween">
        <div class="pageNameWrap">
            <h5 class="secTitle">Gurukul Registration</h5>
        </div>
        <!-- <div class="rightWrap">
            <div class="location-info flex flex-col justify-center items-end mr-10px">
                <form action="{{ route('locale.change') }}" method="POST" class="d-inline">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" class="form-select">
                        <option class="english" value="en" {{ app()->getLocale() == 'en' ? ' selected' : '' }}>
                            English<img width="20" height="20" src="/images/en.png" alt="lang icon" />
                        </option>
                        <option class="hindi" value="hi" {{ app()->getLocale() == 'hi' ? ' selected' : '' }}>Hindi</option>
                    </select>
                </form>
            </div>
        </div> -->

        <div class="rightWrap">
            <div class="location-info flex flex-col justify-center items-end mr-10px">
                <form action="{{ route('locale.change') }}" method="POST" class="d-inline">
                    @csrf
                    <div class="custom-dropdown">

                        <button type="button" class="dropdown-toggle">
                            <img width="20" height="20" src="/images/{{ app()->getLocale() }}.png" alt="lang icon" />
                            {{ app()->getLocale() == 'en' ? '' : '' }}
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-top d-custom-flex justify-space-between primary">
                                <span class="white--text fw-bold">Languages</span>
                                <span class="v-badge warning">2 NEW</span>
                            </div>
                            <div class="langBtnWrap">
                                <button type="submit" name="locale" value="en" class="dropdown-item">
                                    <img width="20" height="20" src="/images/en.png" alt="English" /> English
                                </button>
                                <button type="submit" name="locale" value="hi" class="dropdown-item">
                                    <img width="20" height="20" src="/images/hi.png" alt="Hindi" /> Hindi
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>