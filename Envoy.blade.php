@servers(["localhost" => "127.0.0.1"])

@story("deploy")
build
pushToMaster
@endstory

@task("build", ["on" => "localhost"])
yarn build
@endtask

@task("pushToMaster", ["on" => "localhost"])
git add .
git commit -m "{{$m}}"
git push -u origin main
@endtask
