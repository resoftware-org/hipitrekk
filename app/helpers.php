<?php

/**
 * Get the hash of the current git HEAD
 * @param str $branch The git branch to check
 * @return mixed Either the hash or dev-branch.
 */
function get_current_git_commit($branch='main') {
    if ($hash = file_get_contents(storage_path("app/git-".$branch))) {
        return "$branch-" . substr($hash, 0, 8);
    }

    return "dev-$branch";
}
