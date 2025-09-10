# Auto-push current branch to origin after local commit (PowerShell)
$branch = git rev-parse --abbrev-ref HEAD 2>$null
if ($branch) {
    git push origin $branch
}
