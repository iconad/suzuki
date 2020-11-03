<div>
    <div class="ui sidebar inverted vertical menu sidebar-menu" id="sidebar">
        <div class="item">
          <div class="header">General</div>
          <div class="menu">
            <a class="item">
              <div>
                <i class="icon tachometer alternate"></i>
                Dashboard
              </div>
            </a>
          </div>
        </div>
        <div class="item">
          <div class="header">
            Administration
          </div>
          <div class="menu">
            <a class="item">
              <div><i class="cogs icon"></i>Settings</div>
            </a>
            <a class="item">
              <div><i class="users icon"></i>Team</div>
            </a>
          </div>
        </div>
        <div class="item">
            <div class="header">
              Leads
            </div>
            <div class="menu">
              <a class="item">
                <div><i class="envelope outline icon"></i>Newsletters</div>
              </a>
              <a class="item">
                <div><i class="car icon"></i>Test Drives</div>
              </a>
              <a class="item">
                <div><i class="suitcase icon"></i>Services</div>
              </a>
              <a class="item">
                <div><i class="address card outline icon"></i>Quotations</div>
              </a>
              <a class="item">
                <div><i class="address book outline icon"></i>Quotations (Accessories)</div>
              </a>
              <a class="item">
                <div><i class="comment outline icon"></i>Commitments</div>
              </a>
            </div>
          </div>

        <a href="{{ route('branches.index') }}" class="item">
          <div>
            <i class="icon chart line"></i>
            Branches
          </div>
        </a>

        <div class="item">
          <div class="header">Other</div>
          <div class="menu">
            <a href="#" class="item">
              <div>
                <i class="icon envelope"></i>
                Messages
              </div>
            </a>

            <a href="#" class="item">
              <div>
                <i class="icon calendar alternate"></i>
                Calendar
              </div>
            </a>
          </div>
        </div>

        <div class="hidden">
          <form action="#">
            <div class="ui mini action input">
              <input type="text" placeholder="Search..." />
              <button class="ui mini icon button">
                <i class=" search icon"></i>
              </button>
            </div>
          </form>
        </div>

        <div class="ui segment inverted hidden">
          <div class="ui tiny olive inverted progress">
            <div class="bar" style="width: 54%"></div>
            <div class="label">Monthly Bandwidth</div>
          </div>

          <div class="ui tiny teal inverted progress">
            <div class="bar" style="width:78%"></div>
            <div class="label">Disk Usage</div>
          </div>
        </div>
      </div>
</div>
