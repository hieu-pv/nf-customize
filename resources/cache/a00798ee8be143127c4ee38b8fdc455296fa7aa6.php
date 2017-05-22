<div id="nightfury-customize-admin-menu" class="wrap">
    <div class="row">
        <h1>Customize</h1>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr class="text-center">
                        <td><strong>Title</strong></td>
                        <td><strong>Element</strong></td>
                        <td><strong>Attribute</strong></td>
                        <td><strong>Default</strong></td>
                        <td>
                            <center><strong>Delete</strong></center>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center">
                        <td><?php echo e($value['customize_color_title']); ?></td>
                        <td><?php echo e($value['customize_color_element']); ?></td>
                        <td><?php echo e($value['customize_color_attribute']); ?></td>
                        <td><?php echo e($value['customize_color_default']); ?></td>
                        <td>
                            <center>
                                <form method="post" action="<?php echo e(admin_url('admin-post.php')); ?>">
                                    <input type="hidden" value="nf_customize_remove_entity" name="action">
                                    <input type="hidden" value="<?php echo e($key); ?>" name="key">
                                    <button type="submit" style="background: transparent; border: none; box-shadow: none; cursor: pointer;">
                                        <span type="submit" class="dashicons dashicons-no-alt"></span>
                                    </button>
                                </form>
                            </center>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 customize-form" style="max-width: 500px;">
            <div class="col-md-12 col-sm-12">
                <h4>Add Customize Element</h4>
            </div>
            <table class="form-table">
                <form method="post" action="<?php echo e(admin_url('admin-post.php')); ?>">
                    <input type="hidden" value="nf_customize_add_entity" name="action">
                    <tr>
                        <td>
                            <label>Tilte</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="customize_color_title" placeholder="Ex: Background Color" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Default Value</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="customize_color_default" placeholder="Ex: #fff" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>CSS Selector</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="customize_color_element" placeholder="Ex: .wrapper > #element" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>CSS attribute</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="customize_color_attribute" placeholder="Ex: background-color" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" class="button button-default" value="Add Customize Element" name="customize_color_submit_btn">
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</div>
