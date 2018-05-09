<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === rtrim($pathinfo, '/')) {
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                        goto not__profiler_home;
                    } else {
                        return $this->redirect($rawPathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ('/_profiler/purge' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // homepage
        if ('' === rtrim($pathinfo, '/')) {
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                goto not_homepage;
            } else {
                return $this->redirect($rawPathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }
        not_homepage:

        if (0 === strpos($pathinfo, '/employee-management')) {
            if (0 === strpos($pathinfo, '/employee-management/employee-attendance')) {
                // employee_attendance
                if ('/employee-management/employee-attendance' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\EmployeeAttendanceController::employeeAttendanceAction',  '_route' => 'employee_attendance',);
                }

                if (0 === strpos($pathinfo, '/employee-management/employee-attendance/time-')) {
                    // time_in
                    if (0 === strpos($pathinfo, '/employee-management/employee-attendance/time-in') && preg_match('#^/employee\\-management/employee\\-attendance/time\\-in/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_time_in;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'time_in')), array (  '_controller' => 'AppBundle\\Controller\\EmployeeAttendanceController::timeInAction',));
                    }
                    not_time_in:

                    // time_out
                    if (0 === strpos($pathinfo, '/employee-management/employee-attendance/time-out') && preg_match('#^/employee\\-management/employee\\-attendance/time\\-out/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_time_out;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'time_out')), array (  '_controller' => 'AppBundle\\Controller\\EmployeeAttendanceController::timeOutAction',));
                    }
                    not_time_out:

                }

            }

            // login
            if ('/employee-management/login' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::loginAction',  '_route' => 'login',);
            }

            // show_users
            if ('/employee-management' === rtrim($pathinfo, '/')) {
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                    goto not_show_users;
                } else {
                    return $this->redirect($rawPathinfo.'/', 'show_users');
                }

                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_show_users;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::usersAction',  '_route' => 'show_users',);
            }
            not_show_users:

            if (0 === strpos($pathinfo, '/employee-management/show-employee')) {
                // show_employees
                if ('/employee-management/show-employees' === $pathinfo) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_show_employees;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::employeesAction',  '_route' => 'show_employees',);
                }
                not_show_employees:

                // show_employee
                if (preg_match('#^/employee\\-management/show\\-employee/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'show_employee')), array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::showEmployeeAction',));
                }

            }

            // new_employee
            if ('/employee-management/new-employee' === $pathinfo) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_new_employee;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::newEmployeeAction',  '_route' => 'new_employee',);
            }
            not_new_employee:

            if (0 === strpos($pathinfo, '/employee-management/e')) {
                // edit_employee
                if (0 === strpos($pathinfo, '/employee-management/edit-employee') && preg_match('#^/employee\\-management/edit\\-employee/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_edit_employee;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_employee')), array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::editEmployeeAction',));
                }
                not_edit_employee:

                // employee_delete
                if (0 === strpos($pathinfo, '/employee-management/employee-delete') && preg_match('#^/employee\\-management/employee\\-delete/(?P<id>[^/]++)/?$#sD', $pathinfo, $matches)) {
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                        goto not_employee_delete;
                    } else {
                        return $this->redirect($rawPathinfo.'/', 'employee_delete');
                    }

                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_employee_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'employee_delete')), array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::deleteUserAction',));
                }
                not_employee_delete:

            }

            // user_delete
            if (0 === strpos($pathinfo, '/employee-management/user-delete') && preg_match('#^/employee\\-management/user\\-delete/(?P<id>[^/]++)/?$#sD', $pathinfo, $matches)) {
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                    goto not_user_delete;
                } else {
                    return $this->redirect($rawPathinfo.'/', 'user_delete');
                }

                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::deleteEmployeeAction',));
            }
            not_user_delete:

            // attendance_records
            if (0 === strpos($pathinfo, '/employee-management/attendance-records') && preg_match('#^/employee\\-management/attendance\\-records/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'attendance_records')), array (  '_controller' => 'AppBundle\\Controller\\EmployeeController::attendanceRecordAction',));
            }

            // user_registration
            if ('/employee-management/register' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'user_registration',);
            }

        }

        // logout
        if ('/logout' === $pathinfo) {
            return array('_route' => 'logout');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
