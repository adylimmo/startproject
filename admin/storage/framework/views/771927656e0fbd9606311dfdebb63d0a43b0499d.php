






<li class="<?php echo e(Request::is('customers*') ? 'active' : ''); ?>">
    <a href="<?php echo route('customers.index'); ?>"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>

<li class="<?php echo e(Request::is('sales*') ? 'active' : ''); ?>">
    <a href="<?php echo route('sales.index'); ?>"><i class="fa fa-edit"></i><span>Sales</span></a>
</li>

<li class="<?php echo e(Request::is('tasks*') ? 'active' : ''); ?>">
    <a href="<?php echo route('tasks.index'); ?>"><i class="fa fa-edit"></i><span>Tasks</span></a>
</li>


<li class="<?php echo e(Request::is('activities*') ? 'active' : ''); ?>">
    <a href="<?php echo route('activities.index'); ?>"><i class="fa fa-edit"></i><span>Activities</span></a>
</li>

<li class="<?php echo e(Request::is('assigments*') ? 'active' : ''); ?>">
    <a href="<?php echo route('assigments.index'); ?>"><i class="fa fa-edit"></i><span>Assigments</span></a>
</li>

<li class="<?php echo e(Request::is('reports*') ? 'active' : ''); ?>">
    <a href="<?php echo route('reports.index'); ?>"><i class="fa fa-edit"></i><span>Reports</span></a>
</li>

