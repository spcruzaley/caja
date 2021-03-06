<?php

namespace Base;

use \Prestamo as ChildPrestamo;
use \PrestamoQuery as ChildPrestamoQuery;
use \Exception;
use \PDO;
use Map\PrestamoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'prestamo' table.
 *
 *
 *
 * @method     ChildPrestamoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPrestamoQuery orderBySocioId($order = Criteria::ASC) Order by the socio_id column
 * @method     ChildPrestamoQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     ChildPrestamoQuery orderByInteres($order = Criteria::ASC) Order by the interes column
 * @method     ChildPrestamoQuery orderByComentario($order = Criteria::ASC) Order by the comentario column
 * @method     ChildPrestamoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildPrestamoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildPrestamoQuery groupById() Group by the id column
 * @method     ChildPrestamoQuery groupBySocioId() Group by the socio_id column
 * @method     ChildPrestamoQuery groupByCantidad() Group by the cantidad column
 * @method     ChildPrestamoQuery groupByInteres() Group by the interes column
 * @method     ChildPrestamoQuery groupByComentario() Group by the comentario column
 * @method     ChildPrestamoQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildPrestamoQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildPrestamoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPrestamoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPrestamoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPrestamoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPrestamoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPrestamoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPrestamoQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     ChildPrestamoQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     ChildPrestamoQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     ChildPrestamoQuery joinWithSocio($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Socio relation
 *
 * @method     ChildPrestamoQuery leftJoinWithSocio() Adds a LEFT JOIN clause and with to the query using the Socio relation
 * @method     ChildPrestamoQuery rightJoinWithSocio() Adds a RIGHT JOIN clause and with to the query using the Socio relation
 * @method     ChildPrestamoQuery innerJoinWithSocio() Adds a INNER JOIN clause and with to the query using the Socio relation
 *
 * @method     ChildPrestamoQuery leftJoinAbono($relationAlias = null) Adds a LEFT JOIN clause to the query using the Abono relation
 * @method     ChildPrestamoQuery rightJoinAbono($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Abono relation
 * @method     ChildPrestamoQuery innerJoinAbono($relationAlias = null) Adds a INNER JOIN clause to the query using the Abono relation
 *
 * @method     ChildPrestamoQuery joinWithAbono($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Abono relation
 *
 * @method     ChildPrestamoQuery leftJoinWithAbono() Adds a LEFT JOIN clause and with to the query using the Abono relation
 * @method     ChildPrestamoQuery rightJoinWithAbono() Adds a RIGHT JOIN clause and with to the query using the Abono relation
 * @method     ChildPrestamoQuery innerJoinWithAbono() Adds a INNER JOIN clause and with to the query using the Abono relation
 *
 * @method     \SocioQuery|\AbonoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPrestamo findOne(ConnectionInterface $con = null) Return the first ChildPrestamo matching the query
 * @method     ChildPrestamo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPrestamo matching the query, or a new ChildPrestamo object populated from the query conditions when no match is found
 *
 * @method     ChildPrestamo findOneById(int $id) Return the first ChildPrestamo filtered by the id column
 * @method     ChildPrestamo findOneBySocioId(int $socio_id) Return the first ChildPrestamo filtered by the socio_id column
 * @method     ChildPrestamo findOneByCantidad(int $cantidad) Return the first ChildPrestamo filtered by the cantidad column
 * @method     ChildPrestamo findOneByInteres(int $interes) Return the first ChildPrestamo filtered by the interes column
 * @method     ChildPrestamo findOneByComentario(string $comentario) Return the first ChildPrestamo filtered by the comentario column
 * @method     ChildPrestamo findOneByCreatedAt(string $created_at) Return the first ChildPrestamo filtered by the created_at column
 * @method     ChildPrestamo findOneByUpdatedAt(string $updated_at) Return the first ChildPrestamo filtered by the updated_at column *

 * @method     ChildPrestamo requirePk($key, ConnectionInterface $con = null) Return the ChildPrestamo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrestamo requireOne(ConnectionInterface $con = null) Return the first ChildPrestamo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPrestamo requireOneById(int $id) Return the first ChildPrestamo filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrestamo requireOneBySocioId(int $socio_id) Return the first ChildPrestamo filtered by the socio_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrestamo requireOneByCantidad(int $cantidad) Return the first ChildPrestamo filtered by the cantidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrestamo requireOneByInteres(int $interes) Return the first ChildPrestamo filtered by the interes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrestamo requireOneByComentario(string $comentario) Return the first ChildPrestamo filtered by the comentario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrestamo requireOneByCreatedAt(string $created_at) Return the first ChildPrestamo filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrestamo requireOneByUpdatedAt(string $updated_at) Return the first ChildPrestamo filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPrestamo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPrestamo objects based on current ModelCriteria
 * @method     ChildPrestamo[]|ObjectCollection findById(int $id) Return ChildPrestamo objects filtered by the id column
 * @method     ChildPrestamo[]|ObjectCollection findBySocioId(int $socio_id) Return ChildPrestamo objects filtered by the socio_id column
 * @method     ChildPrestamo[]|ObjectCollection findByCantidad(int $cantidad) Return ChildPrestamo objects filtered by the cantidad column
 * @method     ChildPrestamo[]|ObjectCollection findByInteres(int $interes) Return ChildPrestamo objects filtered by the interes column
 * @method     ChildPrestamo[]|ObjectCollection findByComentario(string $comentario) Return ChildPrestamo objects filtered by the comentario column
 * @method     ChildPrestamo[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildPrestamo objects filtered by the created_at column
 * @method     ChildPrestamo[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildPrestamo objects filtered by the updated_at column
 * @method     ChildPrestamo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PrestamoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PrestamoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'caja_db', $modelName = '\\Prestamo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPrestamoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPrestamoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPrestamoQuery) {
            return $criteria;
        }
        $query = new ChildPrestamoQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPrestamo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PrestamoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PrestamoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPrestamo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, socio_id, cantidad, interes, comentario, created_at, updated_at FROM prestamo WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPrestamo $obj */
            $obj = new ChildPrestamo();
            $obj->hydrate($row);
            PrestamoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPrestamo|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PrestamoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PrestamoTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestamoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the socio_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySocioId(1234); // WHERE socio_id = 1234
     * $query->filterBySocioId(array(12, 34)); // WHERE socio_id IN (12, 34)
     * $query->filterBySocioId(array('min' => 12)); // WHERE socio_id > 12
     * </code>
     *
     * @see       filterBySocio()
     *
     * @param     mixed $socioId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterBySocioId($socioId = null, $comparison = null)
    {
        if (is_array($socioId)) {
            $useMinMax = false;
            if (isset($socioId['min'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_SOCIO_ID, $socioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($socioId['max'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_SOCIO_ID, $socioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestamoTableMap::COL_SOCIO_ID, $socioId, $comparison);
    }

    /**
     * Filter the query on the cantidad column
     *
     * Example usage:
     * <code>
     * $query->filterByCantidad(1234); // WHERE cantidad = 1234
     * $query->filterByCantidad(array(12, 34)); // WHERE cantidad IN (12, 34)
     * $query->filterByCantidad(array('min' => 12)); // WHERE cantidad > 12
     * </code>
     *
     * @param     mixed $cantidad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestamoTableMap::COL_CANTIDAD, $cantidad, $comparison);
    }

    /**
     * Filter the query on the interes column
     *
     * Example usage:
     * <code>
     * $query->filterByInteres(1234); // WHERE interes = 1234
     * $query->filterByInteres(array(12, 34)); // WHERE interes IN (12, 34)
     * $query->filterByInteres(array('min' => 12)); // WHERE interes > 12
     * </code>
     *
     * @param     mixed $interes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterByInteres($interes = null, $comparison = null)
    {
        if (is_array($interes)) {
            $useMinMax = false;
            if (isset($interes['min'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_INTERES, $interes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interes['max'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_INTERES, $interes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestamoTableMap::COL_INTERES, $interes, $comparison);
    }

    /**
     * Filter the query on the comentario column
     *
     * Example usage:
     * <code>
     * $query->filterByComentario('fooValue');   // WHERE comentario = 'fooValue'
     * $query->filterByComentario('%fooValue%', Criteria::LIKE); // WHERE comentario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comentario The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterByComentario($comentario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comentario)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestamoTableMap::COL_COMENTARIO, $comentario, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestamoTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(PrestamoTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestamoTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Socio object
     *
     * @param \Socio|ObjectCollection $socio The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterBySocio($socio, $comparison = null)
    {
        if ($socio instanceof \Socio) {
            return $this
                ->addUsingAlias(PrestamoTableMap::COL_SOCIO_ID, $socio->getId(), $comparison);
        } elseif ($socio instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PrestamoTableMap::COL_SOCIO_ID, $socio->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySocio() only accepts arguments of type \Socio or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Socio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function joinSocio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Socio');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Socio');
        }

        return $this;
    }

    /**
     * Use the Socio relation Socio object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SocioQuery A secondary query class using the current class as primary query
     */
    public function useSocioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSocio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Socio', '\SocioQuery');
    }

    /**
     * Filter the query by a related \Abono object
     *
     * @param \Abono|ObjectCollection $abono the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPrestamoQuery The current query, for fluid interface
     */
    public function filterByAbono($abono, $comparison = null)
    {
        if ($abono instanceof \Abono) {
            return $this
                ->addUsingAlias(PrestamoTableMap::COL_ID, $abono->getPrestamoId(), $comparison);
        } elseif ($abono instanceof ObjectCollection) {
            return $this
                ->useAbonoQuery()
                ->filterByPrimaryKeys($abono->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAbono() only accepts arguments of type \Abono or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Abono relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function joinAbono($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Abono');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Abono');
        }

        return $this;
    }

    /**
     * Use the Abono relation Abono object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AbonoQuery A secondary query class using the current class as primary query
     */
    public function useAbonoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAbono($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Abono', '\AbonoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPrestamo $prestamo Object to remove from the list of results
     *
     * @return $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function prune($prestamo = null)
    {
        if ($prestamo) {
            $this->addUsingAlias(PrestamoTableMap::COL_ID, $prestamo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the prestamo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PrestamoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PrestamoTableMap::clearInstancePool();
            PrestamoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PrestamoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PrestamoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PrestamoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PrestamoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(PrestamoTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(PrestamoTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(PrestamoTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(PrestamoTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(PrestamoTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildPrestamoQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(PrestamoTableMap::COL_CREATED_AT);
    }

} // PrestamoQuery
