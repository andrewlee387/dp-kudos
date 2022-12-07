    <div id="footer">
      <ul>
        <li id="home"><a href="/blog">Home</a></li>
        <li id="GDrive"><a href="https://drive.google.com">GDrive</a></li>
        <li id="flexsched"><a href="//scheduler.dayspringpartners.com/">Scheduler</a></li>
        <li id="timesheet"><a href="/timesheetPHP/project/project.php">Timesheet</a></li>
        <li id="defects"><a href="/timesheetPHP/task/task_sum.php">WebTrack</a></li>
        <li id="assets"><a href="http://intranet.dayspring.office:8080/assettrack">Assets</a></li>
        <li id="sales"><a href="https://drive.google.com/drive/u/0/folders/0B-t7ksMWmJcvbl9GSVppS1hrbFk">Sales</a></li>
        <li id="kudos"><a href="https://dayspring-kudos.herokuapp.com/login?username=<?php echo safeParseLogin(); ?>&password=dtpartners">Kudos</a></li>
      </ul>

        <p>
            &copy; 1998-<?php echo date("Y") ?> Dayspring Technologies, Inc. All Rights Reserved. INTERNAL USE ONLY
            powered by <a href="http://wordpress.org/">WordPress</a>
        </p>
    </div>
</div> <!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
