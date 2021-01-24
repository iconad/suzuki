<div>
    <div class="ui sidebar inverted vertical menu sidebar-menu" id="sidebar">
        <div class="item">
          <div class="header">General</div>
          <div class="menu">
            <a href="/manage/dashboard" class="item">
              <div>
                <i class="icon tachometer alternate"></i>
                Dashboard
              </div>
            </a>
          </div>
        </div>

        <div class="item">
            <div class="header">
              Leads
            </div>
            <div class="menu">
              <a href="/manage/leads/type/newsletter" class="item">
                <div><i class="envelope outline icon"></i>Newsletters</div>
              </a>
              <a href="/manage/leads/type/test-drive" class="item">
                <div><i class="envelope outline icon"></i>Test Drive</div>
              </a>
              <a href="/manage/leads/type/services" class="item">
                <div><i class="envelope outline icon"></i>Services</div>
              </a>
              <a href="/manage/leads/type/quotations" class="item">
                <div><i class="envelope outline icon"></i>Quotations</div>
              </a>
              <a href="/manage/leads/type/accessory-quotations" class="item">
                <div><i class="envelope outline icon"></i>Quotations (Accessories)</div>
              </a>
              <a href="/manage/leads/type/geniune-part" class="item">
                <div><i class="envelope outline icon"></i>Geniune Part</div>
              </a>
              <a href="/manage/leads/type/commitments" class="item">
                <div><i class="envelope outline icon"></i>Commitments</div>
              </a>
              <a href="/manage/leads/type/contact-us" class="item">
                <div><i class="envelope outline icon"></i>Contact</div>
              </a>
            </div>
          </div>

        <a href="/manage/vehicles" class="item">
            <div><i class="car icon"></i>Vehicles</div>
        </a>

        <a href="{{ route('branches.index') }}" class="item">
          <div>
            <i class="icon globe"></i>
            Branches
          </div>
        </a>

        <a href="{{ route('recall-announcements.index') }}" class="item">
          <div>
            <i class="icon bullhorn"></i>
            Recall Announcement
          </div>
        </a>

        <a href="{{ route('pages.index') }}" class="item">
          <div>
            <i class="icon wpforms"></i>
            Pages
          </div>
        </a>

        <a href="/manage/menus?menu=1" class="item">
          <div>
            <i class="icon wpforms"></i>
            Menus
          </div>
        </a>

        <div class="item">
            <div class="header">
              Administration
            </div>
            <div class="menu">
              <a class="item">
                <div><i class="cogs icon"></i>Settings</div>
              </a>
              <a class="item">
                <div><i class="users icon"></i>Users</div>
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
