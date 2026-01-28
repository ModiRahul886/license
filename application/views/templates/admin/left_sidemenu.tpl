<div class="leftside">
    <div class="sidebar">
        <ul class="sidebar-menu">
        {if $data.license_admin_info.eRole eq 'Subadmin'}
            {section name=i loop=$data.leftsidebar}
                {if $data.leftsidebar[i].iParentId eq '0'}
                    {if $data.leftsidebar[i].iModuleId|in_array:$data.adminpermidetail.tListing}

                    <li {if $data.iParentId eq $data.leftsidebar[i]['iModuleId']}class="sub-nav active"{/if} {if $data.url eq $data.leftsidebar[i]['vPath']}class="active"{/if}  {if $data.leftsidebar[i]['vPath'] eq ''}class="sub-nav"{/if}>
                        {if $data.leftsidebar[i]['iParentId'] eq '0'}
                            <a {if $data.leftsidebar[i]['vPath'] neq ''}href="{$data.admin_url}{$data.leftsidebar[i]['vPath']}"{else}href="javascript:void(0);"{/if} id="path_{$data.leftsidebar[i]['iModuleId']}">
                        {/if}
                        {if $data.leftsidebar[i]['vModuleName'] eq 'Dashboard'}
                            <i class="fa fa-home"></i>
                        {/if}
                        {if $data.leftsidebar[i]['vModuleName'] eq 'Admin Management'}
                            <i class="fa fa-fw fa-user"></i>
                        {/if}
                        {if $data.leftsidebar[i]['vModuleName'] eq 'Manage Users'}
                            <i class="fa fa-fw fa-users"></i>
                        {/if}
                        
                        {if $data.leftsidebar[i]['vModuleName'] eq 'General Settings'}
                            <i class="fa fa-fw fa-cogs"></i>
                            <i class="fa fa-angle-right pull-right"></i>
                        {/if}
                        
                            <span>{$data.leftsidebar[i]['vModuleName']}</span>
                        </a>

                        {if $data.leftsidebar[i]['submodule']|@count neq 0}
                            <ul class="sub-menu">
                            {section name=j loop=$data.leftsidebar[i]['submodule']}
                            {if $data.leftsidebar[i]['submodule'][j].iModuleId|in_array:$data.adminpermidetail.tListing}
                                <li {if $data.url eq $data.leftsidebar[i]['submodule'][j]['vPath']}class="active"{/if}>
                                <a href="{$data.admin_url}{$data.leftsidebar[i]['submodule'][j]['vPath']}">
                                    {if $data.leftsidebar[i]['submodule'][j]['vModuleName'] eq 'Owners'}
                                        <i class="fa fa-fw fa-bars"></i>
                                    {/if}
                                    
                                    {if $data.leftsidebar[i]['submodule'][j]['vModuleName'] eq 'Settings'}
                                        <i class="fa fa-fw fa-cog"></i>
                                    {/if}
                                    {$data.leftsidebar[i]['submodule'][j]['vModuleName']}
                                </a>
                                </li>
                            {/if}
                            {/section}
                            </ul>
                        {/if}
                    </li>
                    {/if}

                {/if}
            {/section}

        {else}
        <li class="{if $data.menuAction eq 'Dashboard'}active{/if}">
                <a href="{$data.admin_url}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="{if $data.menuAction eq 'Administrator'}active{/if}">
                <a href="{$data.admin_url}admin_management">
                    <i class="fa fa-fw fa-user"></i> <span>Admin Management</span>
                </a>
            </li>
            
            <li class="{if $data.menuAction eq 'manageUser'}active{/if}">
                <a href="{$data.admin_url}user">
                    <i class="fa fa-fw fa-users"></i> <span>Manage Users</span>
                </a>
            </li>
            <li class="{if $data.menuAction eq 'manageUser'}active{/if}">
                <a href="{$data.admin_url}license">
                    <i class="fa fa-fw fa-users"></i> <span>Manage License</span>
                </a>
            </li>
            <li class="{if $data.menuAction eq 'manageUser'}active{/if}">
                <a href="{$data.admin_url}modules">
                    <i class="fa fa-fw fa-users"></i> <span>Manage Modules</span>
                </a>
            </li>
            
            <li class="{if $data.menuAction eq 'ApiTest'}active{/if}">
                <a href="{$data.admin_url}apitest">
                    <i class="fa fa-fw fa-plug"></i> <span>API Testing</span>
                </a>
            </li>
            
            <li class="sub-nav {if $data.menuAction eq 'Statistic' || $data.menuAction eq 'Charts' || $data.menuAction eq 'Configuration'}active{/if}">
            
                <a href="#fakelink">
                    <i class="fa fa-fw fa-cogs"></i>
                    <i class="fa fa-angle-right pull-right"></i>
                    General Settings
                </a>
                <ul class="sub-menu" {if $data.menuAction eq 'FaqCategory' || $data.menuAction eq 'Faq' || $data.menuAction eq 'emailTemplate' || $data.menuAction eq 'ContactUs' || $data.menuAction eq 'Configuration' || $data.menuAction eq 'Static' || $data.menuAction eq 'MobileImage'}style="display: block;"{/if}>

                    <li class="{if $data.menuAction eq 'emailTemplate'}active{/if}">
                        <a href="{$data.admin_url}emailtemplate"><i class="fa fa-fw fa-clipboard"></i>
                        Email Templates</a>
                    </li>

                    <li class="{if $data.menuAction eq 'Configuration'}active{/if}">
                        <a href="{$data.admin_url}configuration"><i class="fa fa-fw fa-cog"></i>
                        Settings</a>
                    </li>
                </ul>
            </li>
        {/if}

        </ul>
    </div>
</div>