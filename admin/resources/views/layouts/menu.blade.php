<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>

<li class="{{ Request::is('sales*') ? 'active' : '' }}">
    <a href="{!! route('sales.index') !!}"><i class="fa fa-edit"></i><span>Sales</span></a>
</li>

<li class="{{ Request::is('tasks*') ? 'active' : '' }}">
    <a href="{!! route('tasks.index') !!}"><i class="fa fa-edit"></i><span>Tasks</span></a>
</li>


<li class="{{ Request::is('activities*') ? 'active' : '' }}">
    <a href="{!! route('activities.index') !!}"><i class="fa fa-edit"></i><span>Activities</span></a>
</li>

<li class="{{ Request::is('assigments*') ? 'active' : '' }}">
    <a href="{!! route('assigments.index') !!}"><i class="fa fa-edit"></i><span>Assigments</span></a>
</li>

<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{!! route('reports.index') !!}"><i class="fa fa-edit"></i><span>Reports</span></a>
</li>

<!--<li class="{{ Request::is('trackings*') ? 'active' : '' }}">
    <a href="{!! route('trackings.index') !!}"><i class="fa fa-edit"></i><span>Trackings</span></a>
</li>-->

<li class="{{ Request::is('confirms*') ? 'active' : '' }}">
    <a href="{!! route('confirms.index') !!}"><i class="fa fa-edit"></i><span>Confirms</span></a>
</li>

