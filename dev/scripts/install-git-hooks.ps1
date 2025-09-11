# install-git-hooks.ps1 (moved to dev/scripts)
# Script to install git hooks locally
if (-not (Test-Path .git)) {
    Write-Host "Not a git repo"
    exit 1
}
$hooksPath = Join-Path -Path (Get-Location) -ChildPath ".git\hooks"
# ...original hook installation logic
Write-Host "Dev helper script moved to dev/scripts"
