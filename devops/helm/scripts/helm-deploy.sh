set -e
export image_repo=${DOCKER_REGISTRY_PROJECT_PATH}
export image_tag=$PACKAGE_VERSION

mv devops/helm/charts/logging-db/values.yaml devops/helm/charts/logging-db/tmpvalues.yaml \
    && envsubst '${image_repo} ${image_tag} ${image_executor_repo} ${image_executor_tag}' < devops/helm/charts/logging-db/tmpvalues.yaml > devops/helm/charts/logging-db/values.yaml \
    && rm devops/helm/charts/logging-db/tmpvalues.yaml

helm upgrade $HELM_RELEASE_NAME devops/helm/charts/logging-db -f $HELM_CHART_VALUES_FILE --install $HELM_UPGRADE_ARGS