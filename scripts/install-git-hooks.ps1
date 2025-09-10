Param()

Write-Output "Setting Git hooks path to .githooks in repository root..."
git config core.hooksPath ".githooks"

if ($LASTEXITCODE -eq 0) {
    Write-Output "core.hooksPath set. Ensure the .githooks files are executable on Unix (chmod +x .githooks/post-commit)"
} else {
    Write-Error "Failed to set core.hooksPath. Run this script from the repository root and ensure git is available in PATH."
}
