
 # <span style="color:red">Smart Contract Audit Report </span>

# Introduction

A smart contract security review of the **Staking contract**  was done by **Piyush shukla**, with a focus on the security aspects of the application's smart contracts implementation.

# Disclaimer

A smart contract security review can never verify the complete absence of vulnerabilities. This is a time, resource and expertise bound effort where I try to find as many vulnerabilities as possible. I can not guarantee 100% security after the review or even if the review will find any problems with your smart contracts. Subsequent security reviews, bug bounty programs and on-chain monitoring are strongly recommended.

# About **Auditor**

Piyush shukla,is an independent smart contract security researcher. Having found numerous security vulnerabilities in various protocols, he does his best to contribute to the blockchain ecosystem and its protocols by putting time and effort into security research & reviews. Curretly he's Secured to 3 Hacker Rank globally in Smart Contract Security Platform) or reach out on Twitter [Piyushshukla__](https://www.linkedin.com/in/piyush-shukla-44b7a11b1/)

# About **ProtocolName**

_explanation what the protocol does, some architectural comments, technical documentation_

## Observations


# Severity classification

| Severity               | Impact: High | Impact: Medium | Impact: Low |
| ---------------------- | ------------ | -------------- | ----------- |
| **Likelihood: High**   | Critical     | High           | Medium      |
| **Likelihood: Medium** | High         | Medium         | Low         |
| **Likelihood: Low**    | Medium       | Low            | Low         |

**Impact** - the technical, economic and reputation damage of a successful attack

**Likelihood** - the chance that a particular vulnerability gets discovered and exploited

**Severity** - the overall criticality of the risk

# Security Assessment Summary

**_review commit hash_ - Staking contract**

**_fixes review commit hash_ - [](github.com)**

### Scope

The following smart contracts were in scope of the audit:

- `Staking contract`


---

# Findings Summary

| ID     | Title                      | Severity | Status |
| ------ | -----------------------    | -------- | ------ |
| [H-01] |Use safeTransferFrom and safeTransfer instead of TransferFrom and Transfer    | High      | Pending  |
| [H-01] |Missing maximum limit check in the newFees   | High      | Pending   |

# Detailed Findings


## [H-01]Use safeTransferFrom and safeTransfer instead of TransferFrom and Transfer

In the current contract context, you are using the transferFrom and transfer functions, which do not provide a return value. This can lead to situations where tokens may return true or false instead of reverting, potentially resulting in a direct loss of funds. To address this, it is advisable to replace transferFrom and transfer with safeTransferFrom and safeTransfer to ensure safer token transfers.

### Mitigation

use OpenZeppelin’s SafeERC20 , And use `safeTransferFrom` and `safeTransfer` instead `TransferFrom` and `Transfer`


## Severity
High

## Status
Pending

## [H-02]  Missing maximum limit check in the newFees

In the setStakingFees function, there is a missing maximum limit check in the newFees parameter
```
//  a fee setter onlyOwner function to set staking fees %age
    function setStakingFees(uint256 _newFees) external whenNotPaused onlyOwner {
        require(_newFees!=0,"Staking fees cannot be zero");
        uint256 _oldFees=stakingFees;
        stakingFees=_newFees;
        emit StakingFeesChanged(_oldFees, _newFees);
    }

```
### Mitigation

Add `maxfees` limit in code


## Severity
High

## Status
Pending
